<?php

namespace App\Http\Controllers;

use App\faculties;
use App\reservations;
use App\studentData as data;
use Illuminate\Http\Request;
use App\Http\Requests\studentData as StudentRequest;
use App\Http\Requests\verifyRequest;
use App\studentData as student;
Use Alert;
use Illuminate\Support\Carbon;

class studentData extends Controller
{
    public function __construct()
    {
        $this->middleware("notAvailable")->only("index");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = [];
        $reserv = reservations::where("date" , ">=",now())->orderBy("date")->get();
//        dd($reserv);
        foreach ($reserv as $res)
        {

            if ( data::where("date" , $res->date)->count() < $res->max_number)
            {
                $dates [] = $res->date;

            }else
            {

                return view("error.notavailable");
            }

//            echo $res->date;
        }
//        die();
        return view('student.index',['faculties'=> faculties::all(), "reservations" => $dates ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param StudentRequest $request
     * @return void
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $dateNum = student::all()->where('date',$request->date)->count();
//        dd($dateNum);
        $max = reservations::where("date",$request->date)->first()->max_number;
        if ($dateNum >= 0 || $dateNum < $max)
        {
            student::create([
                'name' => $request->name,
                'email' => $request->email,
                'national_id' => $request->national_id,
                'phone_num' => $request->phone_num,
                'faculty' => $request->faculty,
                'date' => $request->date
            ]);
            Alert::success('تم تسجيل البيانات بنجاح');

        }else
        {
            Alert::warning('هذا الموعد مكتمل، يرجي اختيار ميعاد أخر للكشف الطبي');
        }
        return redirect('/');

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
    public function edit(student $id)
    {
        return view("admin.edit",["student"=>$id,"faculties"=> faculties::all(),"dates"=>reservations::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,student $id)
    {
        $request->validate([
            'name' => "required",
            "email" => "required",
            "national_id" => "required|digits:14",
            "phone_num" => "required|digits:11",
            "faculty" => "required",
            "date" => "required"
        ]);
        $id->update([
            'name' => $request->name,
            'email'=> $request->email,
            "national_id" => $request->national_id,
            "phone_num" => $request->phone_num,
            "faculty" => $request->faculty,
            "date" => $request->date
        ]);
        $id->save();
        Alert::success("تم تحديث البيانات بنجاح");
        return redirect("students");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $id)
    {
        $id->delete();
        Alert::success("تم الحذف بنجاح");
        return redirect("students");
    }
    public function verify(verifyRequest $request)
    {
        $studentData = student::where("national_id",$request->national_id);
        if ($studentData->count() > 0)
        {
//            dd($studentData->get());
            return view("student.verified")->withstudents($studentData->first());
        }else{
            Alert::error("لم تقم بالتسجيل بعد، يرجي التسجيل لتحديد موعد للكشف الطبي");
            return view("student.verify");
        }

    }
    public function view()
    {
        return view("admin.students")->withstudents(student::all()->sortBy("faculty"));
    }
}
