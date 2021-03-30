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
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/students')}}">الطلاب</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/faculties')}}">الكليات<span class="sr-only">(current)</span></a>
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
        <h1 class="text-center p-5">الكليات</h1>
        <div class="form-group text-center">
            @if(!empty($AllFaculties))
                <div class="float-left">
                    <a href="/faculties/create" class="btn btn-success mb-3">إضافة كلية جديدة</a>
                </div>
            @endif
            @if(isset($AllFaculties))
                <table class="table" dir="rtl">
                    <thead>
                    <tr>

                        <th scope="col">الكلية</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($AllFaculties))
                    @foreach($AllFaculties as $faculty)
                        <tr>

                            <td>{{$faculty->name}}</td>

                            <td>
                                <form action="{{route("faculties.destroy",$faculty->id)}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <a href="{{url("/faculties/$faculty->id/edit")}}" class="btn btn-primary">تعديل</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form></td>
                        </tr>
                    @endforeach
                    @else
                        <tr class="text-center">
                            <td>
                               <h3>عفواً لا توجد اي بيانات لعرضها</h3>
                            </td>

                        </tr>
                    @endif


                    </tbody>
                </table>


            @endif
        </div>
    </div>
@endsection
