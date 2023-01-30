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
    <header class="shadow header" data-aos="fade-down" data-aos-duration="1000">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <x-nav-header-app></x-nav-header-app>
            {{ $header }}
        </div>
    </header>
@endif
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" data-aos="fade-up"
     data-aos-duration="1000"
     style="margin-bottom: 100px; margin-top: 100px">
    {{ $slot }}
</div>

<div class="aside-infos" data-aos="fade-left" data-aos-duration="1000">
    <div class="container-aside-infos">
        <div class="block-aside-info">
            <h3>Serveurs<i class="fa-solid fa-square-caret-down" id="dropdown-button-serveurs"></i></h3>
            <div class="block-aside-infos" id="dropdown-content-serveurs">
                <p>Re take</p>
                <p>Stuffs</p>
                <p>Mix</p>
            </div>
        </div>
        <div class="block-aside-info">
            <h3>Tournois<i class="fa-solid fa-square-caret-down" id="dropdown-button-tournois"></i></h3>
            <div class="block-aside-infos" id="dropdown-content-tournois">
                <p>Wingman #1</p>
                <p>Aimotion League #3</p>
                <p>Wingman #2</p>
            </div>
        </div>
        <div class="block-aside-info">
            <h3>Réseaux<i class="fa-solid fa-square-caret-down" id="dropdown-button-reseaux"></i></h3>
            <div id="dropdown-content-reseaux">
                <p><i class="fa-brands fa-discord"></i></p>
                <p><i class="fa-brands fa-instagram"></i></p>
                <p><i class="fa-brands fa-twitter"></i></p>
            </div>
        </div>
    </div>
</div>
<script>
    AOS.init();
</script>
<script>
    $(document).ready(function () {
        $("#dropdown-button-serveurs").click(function () {
            $("#dropdown-content-serveurs").animate({
                opacity: 'toggle',
                height: 'toggle',
                fontSize: 'toggle',
            }, 500);
        });
        $("#dropdown-button-tournois").click(function () {
            $("#dropdown-content-tournois").animate({
                opacity: 'toggle',
                height: 'toggle',
                fontSize: 'toggle',
            }, 500);
        });
        $("#dropdown-button-reseaux").click(function () {
            $("#dropdown-content-reseaux").animate({
                opacity: 'toggle',
                height: 'toggle',
                fontSize: 'toggle',
            }, 500);
            $("#dropdown-button-reseaux").toggleClass("border-radius-reseaux");
        });
    });
</script>
</body>
</html>
