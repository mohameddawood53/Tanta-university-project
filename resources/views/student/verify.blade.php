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
                    <a class="nav-link" href="{{url('/')}}">تسجيل بيانات الكشف الطبي </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/verify')}}">تحقق من الميعاد<span class="sr-only">(current)</span></a>
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
        <h1 class="text-center p-5">تحقق من ميعادك للكشف الطبي</h1>
        <div class="form-group text-center">
            <form action="/verify" method="post">
                @method('PUT')
                @csrf
                <label for="national_id"><h3>رقمك القومي</h3></label>
                <input type="number" name="national_id" id="national_id" class="form-control @error('national_id') is-invalid @enderror" placeholder="الرقم القومي">
                @error('national_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <div class="text-center">
                    <input type="submit" value="تحقق" class="btn btn-success m-3 align-content-center">
                </div>

            </form>
        </div>
    </div>
@endsection
