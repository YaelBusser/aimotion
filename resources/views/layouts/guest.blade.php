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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navigation_guest')
@if (isset($header))
    <header class="shadow header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <x-nav-header></x-nav-header>
            {{ $header }}
        </div>
    </header>
@endif
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
     style="margin-bottom: 100px; margin-top: 100px">
    {{ $slot }}
</div>
<div class="aside-infos">


    <div class="container-aside-infos">
        <div class="block-aside-info">
            <h3 id="dropdown-button-serveurs">Serveurs<i class="fa-solid fa-square-caret-down"></i></h3>
            <div class="block-aside-infos" id="dropdown-content-serveurs">
                <p>Re take</p>
                <p>Stuffs</p>
                <p>Mix</p>
            </div>
        </div>
        <div class="block-aside-info">
            <h3 id="dropdown-button-tournois">Tournois<i class="fa-solid fa-square-caret-down"></i></h3>
            <div class="block-aside-infos" id="dropdown-content-tournois">
                <p>Wingman #1</p>
                <p>Aimotion League #3</p>
                <p>Wingman #2</p>
            </div>
        </div>
        <div class="block-aside-info">
            <h3 id="dropdown-button-reseaux">Réseaux<i class="fa-solid fa-square-caret-down"></i></h3>
            <div id="dropdown-content-reseaux">
                <p><i class="fa-brands fa-discord"></i></p>
                <p><i class="fa-brands fa-instagram"></i></p>
                <p><i class="fa-brands fa-twitter"></i></p>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        const dropdownButtonServeurs = document.getElementById("dropdown-button-serveurs");
        const dropdownContentServeurs = document.getElementById("dropdown-content-serveurs");
        dropdownButtonServeurs.addEventListener("click", function () {
            console.log("opk");
            if (dropdownContentServeurs.style.display == "none") {
                dropdownContentServeurs.style.display = "flex";
            } else {
                dropdownContentServeurs.style.display = "none";
            }
        });
        const dropdownButtonTournois = document.getElementById("dropdown-button-tournois");
        const dropdownContentTournois = document.getElementById("dropdown-content-tournois");
        dropdownButtonTournois.addEventListener("click", function () {
            if (dropdownContentTournois.style.display == "none") {
                dropdownContentTournois.style.display = "flex";
            } else {
                dropdownContentTournois.style.display = "none";
            }
        });
        const dropdownButtonReseaux = document.getElementById("dropdown-button-reseaux");
        const dropdownContentReseaux = document.getElementById("dropdown-content-reseaux");
        dropdownButtonReseaux.addEventListener("click", function () {
            if (dropdownContentReseaux.style.display == "none") {
                dropdownContentReseaux.style.display = "flex";
                dropdownButtonReseaux.style.borderRadius = "0 0 0 0";
            } else {
                dropdownContentReseaux.style.display = "none";
                dropdownButtonReseaux.style.borderRadius = "0 0 10px 10px";
            }
        });
    };

</script>
</body>
</html>
