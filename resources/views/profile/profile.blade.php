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
                    <div class="onglet-csgo" id="onglet-csgo">
                        <h3>CS:GO</h3>
                        <div class="body-profile-csgo">
                            <div class="body-profile-csgo-info-g">
                                <p>Informations générales</p>
                            </div>
                            <div class="body-profile-csgo-info-faceit">
                                @if(empty($faceit) || !isset($faceit->games->csgo))
                                    @if (!isset($faceit->games->csgo) AND !empty($user->pseudo_faceit))
                                        <a href="{{route('faceit.login')}}" class="faceitLogIn">
                                            <img src="https://i.postimg.cc/9fNmYjQv/unnamed.png" class="imgFaceitLogin">
                                            <p>se connecter avec faceit</p>
                                        </a>
                                        <p>{{$errorNotGameCsgo}}</p>
                                        <img src="{{$faceit->avatar}}">
                                        <p>pseudonyme: <a href="https://www.faceit.com/fr/players/{{$faceit->nickname}}"
                                                          target="_blank">{{$faceit->nickname}}</a></p>
                                    @else
                                        <a href="{{route('faceit.login')}}" class="faceitLogIn">
                                            <img src="https://i.postimg.cc/9fNmYjQv/unnamed.png" class="imgFaceitLogin">
                                            <p>se connecter avec faceit</p>
                                        </a>
                                    @endif
                                @else
                                    <a href="{{route('faceit.login')}}" class="faceitLogin">
                                        <img src="https://i.postimg.cc/9fNmYjQv/unnamed.png" class="imgFaceitLogin">
                                        <p>changer de compte</p>
                                    </a>
                                    <img src="{{$faceit->avatar}}">
                                    <p>pseudonyme + link : <a href="{{$faceit->faceit_url}}"
                                                              target="_blank">{{$faceit->nickname}}</a></p>
                                    <img src="{{$lvlImg}}">
                                    <p>elo : {{$faceit->games->csgo->faceit_elo}}</p>
                                    <p>K/D
                                        : <?= round($faceitStats->lifetime->{'K/D Ratio'} / $faceitStats->lifetime->Matches, 2); ?></p>
                                    <p>% HS
                                        : <?= round($faceitStats->lifetime->{'Total Headshots %'} / $faceitStats->lifetime->Matches, 2); ?></p>
                                    <p>% WR : <?= $faceitStats->lifetime->{'Win Rate %'}; ?></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="onglet-rl" id="onglet-rl">rocket league</div>
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
            if (window.location.href == "http://127.0.0.1:8000/profile#onglet-csgo") {
                window.location.replace(window.location.href.split("#onglet-csgo")[0]);
            }
        });
        document.getElementById("csgo").addEventListener("click", function () {
            document.querySelector("#csgo").style.backgroundColor = "#717171";
            document.querySelector("#rocketleague").style.backgroundColor = "#232323";
            document.querySelector("#onglet-csgo").style.display = "block";
            document.querySelector("#onglet-rl").style.display = "none";
        });

        document.getElementById("rocketleague").addEventListener("click", function () {
            document.querySelector("#csgo").style.backgroundColor = "#232323";
            document.querySelector("#rocketleague").style.backgroundColor = "#717171";
            document.querySelector("#onglet-csgo").style.display = "none";
            document.querySelector("#onglet-rl").style.display = "block";
        });
    </script>
</x-app-layout>
