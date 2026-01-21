<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('website.layout.css')
    <title>
        @yield('title')
     </title>

</head>

<body >
    @include('website.layout.header')
    @yield('content')
    @include('website.layout.footer')
    @include('website.layout.js')
</body>

</html>
