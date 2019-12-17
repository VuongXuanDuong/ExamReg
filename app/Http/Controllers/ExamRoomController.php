<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamRoom;
use App\Models\ExamShift;
use App\Models\Room;
use Illuminate\Http\Request;

class ExamRoomController extends Controller
{
    public function index()
    {
        $examRooms = ExamRoom::with('examShift.module')->with('room.area')
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
}
