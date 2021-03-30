<?php

namespace App\Http\Controllers;

use App\faculties;
use App\Http\Requests\facultiesRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class facultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('authAdmin:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.faculty.index")->with("AllFaculties",faculties::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.faculty.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(facultiesRequest $request)
    {
        faculties::create([
            "name" => $request->name
        ]);
        Alert::success("لقد تم إدخال بيانات الكلية بنجاح");
        return redirect("faculties");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.faculty.edit")->with("facutlies",faculties::where("id",$id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => "required"
        ]);
        $faculty = faculties::where("id",$id)->first();
        $faculty->update([
            "name" => $request->name
        ]);
        $faculty->save();
        Alert::success("تم تعديل بيانات الكلية بنجاح");
        return redirect("faculties");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(faculties $id)
    {
        $id->delete();
//        faculties::where("id",$id)->delete();
        Alert::success("تم حذف بيانات الكلية بنجاح");
        return redirect("faculties");
    }
}
