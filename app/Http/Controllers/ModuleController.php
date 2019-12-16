<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::orderBy('id', 'DESC')->paginate(20);
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
}
