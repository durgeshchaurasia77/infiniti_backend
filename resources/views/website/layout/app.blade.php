<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Infinit Tech Solution</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
