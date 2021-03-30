@extends('student.app')
@section('nav')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{url("/")}}" style="font-size: 25px">الإدارة الطبية</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/')}}">تسجيل بيانات الكشف الطبي <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/verify')}}">تحقق من الميعاد</a>
                </li>
                @guest("admin")
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/students')}}">الطلاب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/faculties')}}">الكليات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/reservations')}}">المواعيد</a>
                </li>
                @endguest
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="#">Pricing</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
                {{--                </li>--}}
            </ul>
        </div>
        @guest('admin')
            <a href="/admin/login" class="btn btn-outline-success my-2 my-sm-0 float-left">تسجيل الدخول</a>
        @else
            <a href="/dashboard" class="btn btn-outline-info my-2 my-sm-0 float-left">لوحة التحكم </a>
            <a href="/admin/logout" class="btn btn-outline-danger my-2 my-sm-0 float-left m-2">تسجيل الخروج</a>
        @endguest

    </nav>
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center pt-5 mb-3">عذراً هذه الصفحة تحت الصيانة و غير متاحة حالياً </h1>
        <div class="text-center">
            <img src="/imgs/DxswvTzXQAoZqgH.jpg" alt="خد هنا انت رايح فين؟ حاول مرة أخري لاحقاً" width="400" height="300">
            <h1 class="p-2">خد هنا انتَ رايح فين؟ حاول مرة أخري بعد قليل</h1>
        </div>
{{--        <div class="form-group">--}}
{{--            @if(isset($students))--}}
{{--                <h4><span>الاسم : </span> {{$students->name}} <br></h4>--}}
{{--                <h4><span>البريد الالكتروني : </span> {{$students->email}} <br></h4>--}}
{{--                <h4><span>الرقم القومي : </span> {{$students->national_id}} <br></h4>--}}
{{--                <h4><span>الكلية : </span> {{$students->faculty}} <br></h4>--}}
{{--                <h4><span>ميعاد الكشف الطبي : </span><div class="badge badge-success"> {{$students->date}} </div><br></h4>--}}
{{--            @endif--}}


{{--        </div>--}}
    </div>
@endsection
