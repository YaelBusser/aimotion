<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profil') }}
        </h2>
    </x-slot>
    <div class="body-profile">
        <div class="block-profile">
            <div class="profile-header">
                <img src="<?= $user->avatar; ?>">
                <?= $user->name; ?>
            </div>
            <div class="profile-header-param">
                <x-nav-link href="/profile-edit" :active="request()->routeIs('profile-edit')">
                    <i class="fa-solid fa-gear"></i>
                </x-nav-link>
            </div>
        </div>
        <div class="block-profile-info-histo">
            <div class="block-profile-infos">
                <nav>
                    <a href="#onglet-csgo" id="csgo"><p>csgo</p></a>
                    <a href="#onglet-rl" id="rocketleague"><p>rocket league</p></a>
                </nav>
                <div class="profile-infos">
                    <h2>Informations</h2>
                    <div class="body-profile-infos">
                        <div id="onglet-csgo">csgo</div>
                        <div id="onglet-rl">rocket league</div>
                    </div>
                </div>
            </div>
            <div class="profile-histo">
                <h2>Historique</h2>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("load", function () {
            if (window.location.href == "http://127.0.0.1:8000/profile#onglet-rl") {
                window.location.replace(window.location.href.split("#onglet-rl")[0]);
            }
            if(window.location.href == "http://127.0.0.1:8000/profile#onglet-csgo"){
                window.location.replace(window.location.href.split("#onglet-csgo")[0]);
            }
        });
        document.getElementById("csgo").addEventListener("click", function () {
            document.querySelector("#csgo").style.backgroundColor = "#717171";
            document.querySelector("#rocketleague").style.backgroundColor = "#232323";
        });

        document.getElementById("rocketleague").addEventListener("click", function () {
            document.querySelector("#csgo").style.backgroundColor = "#232323";
            document.querySelector("#rocketleague").style.backgroundColor = "#717171";
        });
    </script>
</x-app-layout>
