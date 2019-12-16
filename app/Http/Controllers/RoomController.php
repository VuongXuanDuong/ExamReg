<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Area;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('area')->get();
        $areas = Area::orderBy('id', 'DESC')->paginate(20);
        return view('room.index', compact('rooms', 'areas'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('room.index', compact('room'));
    }

    //Delete room
    public function destroy($id)
    {
        //Delete if exist
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

    //Create Room
    public function store(Request $request)
    {
        Room::create(["name" => $request['name'], "total_computer" => $request['total_computer'], "area_id" => $request['area_id']]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    //update room
    public function update(Request $request, $id)
    {

        $room = Room::findOrFail($id);
        //Teacher Account table
        $room->name = $request['name'];
        $room->total_computer = $request['total_computer'];
        $room->area_id = $request['area_id'];

        $room->save();


        return redirect()->back();
    }
}
