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
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/verify')}}">تحقق من الميعاد</a>
                </li>
                @guest("admin")
                @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/students')}}"><span class="sr-only">(current)</span>الطلاب</a>
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
        <h1 class="text-center p-5">الطلاب الذين قاموا بالتسجيل</h1>
        <div class="form-group text-center">
            @if(isset($students))
                <table class="table" dir="rtl">
                    <thead>
                    <tr>
                        <th scope="col">الاسم</th>
                        <th scope="col">الكلية</th>
                        <th scope="col">الرقم القومي</th>
                        <th scope="col">ميعاد الكشف الطبي</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(@$students as $student)
                        <tr>

                            <td>{{$student->name}}</td>
                            <td>{{$student->faculty}}</td>
                            <td>{{$student->national_id}}</td>
                            <td>{{$student->date}}</td>
                            <td>
                                <form action="{{url("/",$student->id)}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <a href="{{url("$student->id/edit")}}" class="btn btn-primary">تعديل</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form></td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
