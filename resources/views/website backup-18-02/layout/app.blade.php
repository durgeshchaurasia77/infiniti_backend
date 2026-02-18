<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Infinit Tech Solution</title>
    {{-- <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', config('app.name'))</title>

    {{-- Dynamic Meta Description --}}
    <meta name="description" content="@yield('meta_description', 'Infinit Tech Solution - Web, App & Digital Solutions')">

    {{-- Dynamic Meta Keywords (optional) --}}
    <meta name="keywords" content="@yield('meta_keywords', 'infinit tech, software company, web development')">

    {{-- Robots --}}
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">

    {{-- Canonical URL --}}
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Viewport --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Open Graph (Social Sharing) --}}
    <meta property="og:title" content="@yield('og_title', trim($__env->yieldContent('title', config('app.name'))))">
    <meta property="og:description" content="@yield('og_description', trim($__env->yieldContent('meta_description')))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:image" content="@yield('og_image', asset('default-og-image.jpg'))">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', trim($__env->yieldContent('title', config('app.name'))))">
    <meta name="twitter:description" content="@yield('twitter_description', trim($__env->yieldContent('meta_description')))">
    <meta name="twitter:image" content="@yield('twitter_image', asset('default-og-image.jpg'))">


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
