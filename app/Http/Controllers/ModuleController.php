<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Module;
use App\Models\ModuleUser;
use App\StudentAccount;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {

        $modules = Module::withCount('module_user')->get();
//        ->with('module_user.user')
        return view('module.index', compact('modules'));
    }

    //Delete module
    public function destroy($id)
    {
        //Delete if exist
        $module = Module::findOrFail($id);
        $module->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

    //Create module
    public function store(Request $request)
    {
        Module::create(["name" => $request['name'], "code" => $request['code']]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    //update module
    public function update(Request $request, $id)
    {

        $module = Module::findOrFail($id);
        $module->name = $request['name'];
        $module->code = $request['code'];

        $module->save();


        return redirect()->back();
    }

    public function listStudent(Request $request, $id)
    {
        $module = Module::findOrFail($id);
        $users = ModuleUser::where('module_id', $id)->with('user')->get();
        $students = StudentAccount::all();
        return view('module.listStudent', compact('module', 'users', 'students'));
    }

    public function storeStudent(Request $request, $id)
    {
        $module_id = $id;
        // exam is the newest
        $exam = Exam::orderBy('id', 'desc')->first();
        $exam_id = $exam->id;
        ModuleUser::create(["module_id" => $module_id, "user_id" => $request['user_id'],
            "status" => true, "exam_id" => $exam_id]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    public function destroyStudent(Request $request, $id)
    {
        $module_user_id = $request['module_user_id'];
        $module_user = ModuleUser::findOrFail($module_user_id);
        $module_user->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

}
