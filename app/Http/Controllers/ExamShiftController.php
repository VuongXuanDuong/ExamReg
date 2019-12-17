<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamShift;
use App\Models\Module;
use Illuminate\Http\Request;

class ExamShiftController extends Controller
{
    public function index()
    {
        $examShifts = ExamShift::with('module')->with('exam')
            ->orderBy('id', 'DESC')->paginate(20);
        $exams = Exam::orderBy('id', 'DESC')->paginate(20);
        $modules = Module::orderBy('id', 'DESC')->paginate(20);
        return view('examShift.index', compact('examShifts', 'exams', 'modules'));
    }

    //Delete exam shift
    public function destroy($id)
    {
        //Delete if exist
        $examShift = ExamShift::findOrFail($id);
        $examShift->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

    //Create exam
    public function store(Request $request)
    {
        ExamShift::create(["module_id" => $request['module_id'], "exam_id" => $request['exam_id'], "day" => $request['day'],
            "time_start" => $request['time_start'], "time_finish" => $request['time_finish']]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    //update exam
    public function update(Request $request, $id)
    {

        $examShift = ExamShift::findOrFail($id);
        $examShift->module_id = $request['module_id'];
        $examShift->exam_id = $request['exam_id'];
        $examShift->day = $request['day'];
        $examShift->time_start = $request['time_start'];
        $examShift->time_finish = $request['time_finish'];
        $examShift->save();


        return redirect()->back();
    }
}
