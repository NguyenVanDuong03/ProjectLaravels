<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Danh sách')</title>
    <link rel="shortcut icon" href="https://static-00.iconduck.com/assets.00/open-book-icon-2048x2048-wuklhx59.png" type="image/x-icon">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font/fontawesome/css/all.min.css')}}" rel="stylesheet">
</head>

<body>

 @include('layouts.header')
    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content -->
    </footer>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
