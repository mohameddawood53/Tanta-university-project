<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/imgs/logo.jpg" type="image/x-icon">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <title>الإدارة الطبية بجامعه طنطا - الكشف الطبي</title>
    <style>
        *{
            direction: rtl;
            font-family: Cairo;
        }
    </style>
</head>
<body dir="rtl" class="text-right">
    @include('sweetalert::alert')
    @yield('nav')
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
