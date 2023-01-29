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
    <link rel="stylesheet" href="{{ url('styles/guest.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navigation_guest')
@if (isset($header))
    <header class="shadow header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
@endif
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="margin-bottom: 100px; margin-top: 100px">
    {{ $slot }}
</div>
</body>
</html>
