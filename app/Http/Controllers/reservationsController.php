<?php

namespace App\Http\Controllers;

use App\Http\Requests\reserveRequest;
use App\reservations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class reservationsController extends Controller
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
//        reservations::all()->sortBy("date")
//        reservations::where("date" , ">=",Carbon::now()->toDateString())->get()
//        dd(date("yy-m-d"));
//        dd(Carbon::now()->toDateString());
        return view("admin.reservations.index")->with("reservations",reservations::all()->sortBy("date"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.reservations.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(reserveRequest $request)
    {
        reservations::create([
            "date" => $request->date,
            "max_number" => $request->max_number
        ]);
        Alert::success("تم إدخال البيانات بنجاح");
        return redirect("reservations");
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
        return view("admin.reservations.edit")->with("reservations",reservations::where("id",$id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "date" => "required",
            "max_number" => "required"
        ]);
        $data = reservations::where("id",$id)->first();
        $data->update([
            "date"=> $request->date,
            "max_number" => $request->max_number
        ]);
        $data->save();
        Alert::success("تم تعديل البيانات بنجاح");
        return redirect("reservations");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        reservations::where("id",$id)->first()->delete();
        Alert::success("تم حذف الميعاد بنجاح");
        return redirect("reservations");
    }
}
