<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::orderBy('id', 'DESC')->paginate(20);
        return view('university.index', compact('universities'));
    }
    //Delete university
    public function destroy($id)
    {
        //Delete if exist
        $university = University::findOrFail($id);
        $university->delete();
        return redirect()->back()->with('del-success', 'Xóa thành công');
    }

    //Create university
    public function store(Request $request)
    {
        University::create(["name" => $request['name'], "short_name" => $request['short_name']]);
        return redirect()->back()->with('create-success', 'Thêm thành công');
    }

    //update university
    public function update(Request $request, $id)
    {

        $university = University::findOrFail($id);
        $university->name = $request['name'];
        $university->short_name = $request['short_name'];

        $university->save();


        return redirect()->back();
    }
}
