<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aimotion') }}</title>
    <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/x-icon"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ url('styles/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
@include('layouts.navigation')
@if (isset($header))
    <header class="header" data-aos="fade-down" data-aos-duration="1000">
        <!-- class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" -->
        <div class="name-header">
            {{ $header }}
        </div>
        <x-nav-header-app></x-nav-header-app>
    </header>
@endif
<div class="block-body" data-aos="fade-up"
     data-aos-duration="1000"
     style="margin-bottom: 200px; margin-top: 200px">
    {{ $slot }}
</div>

<script>
    AOS.init();
</script>
</body>
</html>
