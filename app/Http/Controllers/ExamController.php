<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::orderBy('id', 'DESC')->paginate(20);
        return view('exam.index', compact('exams'));
    }
    //Delete exam
    public function destroy($id)
    {
        //Delete if exist
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

    //Create exam
    public function store(Request $request)
    {
        Exam::create(["name" => $request['name'], "time_start" => $request['time_start'], "time_finish" => $request['time_finish']]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    //update exam
    public function update(Request $request, $id)
    {

        $exam = Exam::findOrFail($id);
        $exam->name = $request['name'];
        $exam->time_start = $request['time_start'];
        $exam->time_finish = $request['time_finish'];
        $exam->save();


        return redirect()->back();
    }
}
