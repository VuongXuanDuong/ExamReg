<?php

namespace App\Http\Controllers;

use App\Models\ExamRoom;
use App\Models\ExamRoomUser;
use App\Models\ExamShift;
use App\Models\ModuleUser;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Course;
use App\Result;
use App\StudentAccount;

class StudentLayoutController extends Controller
{
    //Student layout homepage
    public function index()
    {
        //Get current student information
        $studentCode = \Auth::user()->name;

        $student = StudentAccount::where('username', '=', $studentCode)->first();
        $id_student = $student['id'];
        $modules = ModuleUser::where('user_id', '=', $id_student)->with('module')->get();
        return view('StudentLayout.home', compact('student', 'modules'));
    }

    // About me page
    public function me()
    {
        $studentCode = \Auth::user()->name;
        $student = StudentAccount::where('username', $studentCode)->first();
        return view('StudentLayout.me', compact('student'));
    }

    // Change password
    public function changePass()
    {
        return view('StudentLayout.changepass');
    }

    //Post Change Password
    public function postChangePass(Request $request)
    {
        $request->validate([
            "oldPass" => "required",
            "newPass" => "required|min:8",
            "confirmNewPass" => "required:min:8|same:newPass"
        ]);
        if (\Hash::check($request->oldPass, \Auth::user()->password)) {
            $user = User::find(\Auth::user()->id);
            $user->password = bcrypt($request->newPass);
            $user->save();
            return redirect()->back()->with('success', "Thay doi thanh cong");
        } else {
            return redirect()->back()->with("error", "Mật khẩu hiện tại không đúng");
        }
    }

    public function getAllModules($userId)
    {
        $studentCode = User::find($userId)->name;
        $student = StudentAccount::where('username', '=', $studentCode)->first();
        $id_student = $student['id'];
        $modules = ModuleUser::where('user_id', '=', $id_student)->with('module.exam_shift.exam_room')
            ->get();
        $moduleRegisted = ExamRoomUser::where('user_id', '=', $id_student)->with('exam_room.exam_shift')->get();
        return [$modules, $moduleRegisted];
    }

    public function registerExamSessions(Request $request)
    {

        $shiftId = array_get($request, 'ids');
        $studentCode = User::find($request->userId)->name;
        $student = StudentAccount::where('username', '=', $studentCode)->first();
        $idStudent = $student['id'];
        $shift = ExamShift::find($shiftId);
        $examRooms = ExamRoom::where('exam_shift_id', $shiftId)->orderBy('exam_rooms.id', 'asc')
            ->join('rooms', 'exam_rooms.room_id', 'rooms.id')
            ->select('exam_rooms.id as id', 'rooms.total_computer as capacity')->get();
        foreach ($examRooms as $examRoom) {
            if ($this->totalExamRoomRegistedComputers($examRoom) < $examRoom->capacity) {
                $selectedExamRoom = $examRoom;
                break;
            }
        }
        if (empty($selectedExamRoom)) {
            throw new \Exception("Không còn phòng thi nào còn trống, vui lòng thử lại sau", 1);

        }
        ExamRoomUser::insert(['exam_room_id' => $selectedExamRoom->id, 'user_id' => $idStudent]);
        return 'ok';
    }

    public function totalExamRoomRegistedComputers($examRoom)
    {
        return ExamRoomUser::where('exam_room_id', $examRoom->id)->count();
    }

    public function unRegisterAShift($examRoomUserId)
    {
        $module = ExamRoomUser::find($examRoomUserId)->first();
        $module->delete();
        return 'ok';
    }

    public function registrated()
    {
        return view('StudentLayout.registrated');
    }

    public function registerExamShift($userId)
    {
        $studentCode = User::find($userId)->name;
        $student = StudentAccount::where('username', '=', $studentCode)->first();
        $id_student = $student['id'];
        $modules = ExamRoomUser::where('user_id', '=', $id_student)->with('exam_room.exam_shift.module')->with('exam_room.room.area')->get();
        return $modules;
    }
}
