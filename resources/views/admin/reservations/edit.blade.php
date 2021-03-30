@extends('student.app')
@section('nav')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{url("/")}}" style="font-size: 25px">الإدارة الطبية</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">تسجيل بيانات الكشف الطبي <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
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
        <h1 class="text-center p-5">صفحة تعديل بيانات الميعاد</h1>
        <div class="form-group">
            @if(isset($reservations) && !empty($reservations))

                <form action="{{url("reservations/$reservations->id")}}" method="post">
                    @method("PUT")
                    @csrf
                    <label for="date">الميعاد</label>
                    <input type="date" value="{{$reservations->date}}" name="date" id="date" class="form-control @error('date') is-invalid @enderror" placeholder="اسم الكلية">
                    @error("date")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <label for="max_number">أقصي عدد طلاب للتسجيل</label>
                    <input type="number" value="{{$reservations->max_number}}" name="max_number" id="max_number" class="form-control @error('max_number') is-invalid @enderror" placeholder="اسم الكلية">
                    @error("max_number")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="text-center">
                        <input class="btn btn-success m-3" type="submit" value="تحديث">
                        <a href="/reservations" class="btn btn-dark">إلغاء</a>
                    </div>

                </form>
            @else
                <h3>عفواَ لا يوجد بيانات لعرضها</h3>
            @endif

        </div>
    </div>
@endsection
