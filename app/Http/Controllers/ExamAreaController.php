<?php

namespace App\Http\Controllers;


use App\Models\Area;
use Illuminate\Http\Request;

class ExamAreaController extends Controller
{
    public function index()
    {
        $examAreas = Area::orderBy('id', 'DESC')->paginate(20);
        return view('examArea.index', compact('examAreas'));
    }
    //Delete exam
    public function destroy($id)
    {
        //Delete if exist
        $examArea = Area::findOrFail($id);
        $examArea->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

    //Create exam
    public function store(Request $request)
    {
        Area::create(["name" => $request['name']]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    //update exam
    public function update(Request $request, $id)
    {

        $examArea = Area::findOrFail($id);
        $examArea->name = $request['name'];
        $examArea->save();


        return redirect()->back();
    }
}
