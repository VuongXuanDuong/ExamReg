<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamArea;
use Illuminate\Http\Request;

class ExamShiftController extends Controller
{
    public function index()
    {
        $examAreas = ExamArea::with('exam')->get();
        $exams = Exam::orderBy('id', 'DESC')->paginate(20);
        return view('examArea.index', compact('examAreas','exams'));
    }
    //Delete exam
    public function destroy($id)
    {
        //Delete if exist
        $examArea = ExamArea::findOrFail($id);
        $examArea->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

    //Create exam
    public function store(Request $request)
    {
        ExamArea::create(["name" => $request['name'], "exam_id" => $request['exam_id']]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    //update exam
    public function update(Request $request, $id)
    {

        $examArea = ExamArea::findOrFail($id);
        $examArea->name = $request['name'];
        $examArea->exam_id = $request['exam_id'];
        $examArea->save();


        return redirect()->back();
    }
}
