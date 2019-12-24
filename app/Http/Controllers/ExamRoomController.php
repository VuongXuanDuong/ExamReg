<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamRoom;
use App\Models\ExamShift;
use App\Models\Module;
use App\Models\ModuleUser;
use App\Models\Room;
use App\StudentAccount;
use Illuminate\Http\Request;

class ExamRoomController extends Controller
{
    public function index()
    {
        $examRooms = ExamRoom::with('exam_shift.module')->with('room.area')->withCount('exam_room_user')
            ->orderBy('id', 'DESC')->paginate(20);
        $examShifts = ExamShift::with('module')->orderBy('id', 'DESC')->paginate(20);
        $rooms = Room::with('area')->orderBy('id', 'DESC')->paginate(20);
        return view('examRoom.index', compact('examRooms', 'examShifts', 'rooms'));
    }

    //Delete exam shift
    public function destroy($id)
    {
        //Delete if exist
        $examRoom = ExamRoom::findOrFail($id);
        $examRoom->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

    //Create exam
    public function store(Request $request)
    {
        ExamRoom::create(["exam_shift_id" => $request['exam_shift_id'], "room_id" => $request['room_id'], "name" => $request['name']]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    //update exam
    public function update(Request $request, $id)
    {

        $examRoom = ExamRoom::findOrFail($id);
        $examRoom->exam_shift_id = $request['exam_shift_id'];
        $examRoom->room_id = $request['room_id'];
        $examRoom->name = $request['name'];
        $examRoom->save();


        return redirect()->back();
    }

    public function listStudent($id) {
       $students = ExamRoom::where('id',$id)->with('exam_room_user.user')->with('room.area')->with('exam_shift.module')->get();
        return view('examRoom.listStudent', compact( 'students'));
    }
}
