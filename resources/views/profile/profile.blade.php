<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profil') }}
        </h2>
    </x-slot>
    <div class="body-profile">
        <div class="block-profile">
            <div class="profile-header">
                <img src="../{{$userPublic->avatar}}">
                {{$userPublic->name}}
            </div>
            <div class="profile-header-param">
                <x-nav-link href="/profile-edit" :active="request()->routeIs('profile-edit')">
                    @if ($user->name == $userPublic->name)
                        <i class="fa-solid fa-gear"></i>
                    @endif
                </x-nav-link>
            </div>
        </div>
        <div class="block-profile-infos">
            <nav>
                <a href="#onglet-csgo" id="csgo"><p>csgo</p></a>
                <a href="#onglet-rl" id="rocketleague"><p>rocket league</p></a>
            </nav>
            <div class="flex gap-5">
                <div class="profile-infos">
                    <h2>Informations</h2>
                    <div class="onglet-csgo" id="onglet-csgo">
                        <div class="block-btn-show-infos-pv">
                            @if ($user->name == $userPublic->name)
                                <button id="toggleInfoPv">Informations privées</button>
                            @endif
                        </div>
                        <div class="body-profile-csgo">
                            <div class="body-profile-csgo-info-g">
                                <div class="infos-public" id="infos-public">
                                    <p>Informations publiques</p>
                                </div>
                                <div id="infos-g">
                                    <div class="block-icon-edit-info-g">
                                        @if ($user->name == $userPublic->name)
                                            <i id="toggleFormEditInfoPv"
                                               class="fa-solid fa-pen-to-square icon-edit-info-g"></i>
                                        @endif
                                    </div>
                                    <div id="body-infos-g">
                                        <p class="infos-g-explication">Ces informations sont facultatives et privées,
                                            elles sont utiles pour remplir automatiquement les formulaires de
                                            recrutement au sein d'une équipe de l'Aimotion.</p>
                                        <div class="block-infos-g" id="block-infos-g">
                                            <div class="flex gap-3">
                                                <div class="item-formEditInfoG w-1/2">
                                                    <p>Rank MM</p>
                                                    <div class="block-logo-map-preferee">
                                                        @if(isset($rankMmUser))
                                                            <img src="{{$rankMmUser->logo}}" class="logo-rankmm">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="item-formEditInfoG w-1/2">
                                                    <p>Heures</p>
                                                    <div class="block-logo-map-preferee">
                                                        @if(isset($user->heures_csgo))
                                                            {{$user->heures_csgo}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex gap-3">
                                                <div class="item-formEditInfoG w-1/2">
                                                    <p>Maps les plus jouées</p>
                                                    <div class="block-logo-map-preferee">
                                                        @foreach($mapsPreferees as $mapsPreferee)
                                                            <img src="{{$mapsPreferee->logo}}"
                                                                 class="logo-map-preferee">
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="item-formEditInfoG w-1/2">
                                                    <p>Maps les moins jouées</p>
                                                    <div class="block-logo-map-preferee">
                                                        @foreach($mapsMoinsJouees as $mapMoinsJouees)
                                                            <img src="{{$mapMoinsJouees->logo}}"
                                                                 class="logo-map-preferee">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form method="post" action="/profile/infoG/csgo" id="formEditInfoPv"
                                      class="formEditInfoG">
                                    @csrf
                                    <div class="body-formEditInfoG">
                                        <div class="block-body-formEditInfoG">
                                            <div class="item-formEditInfoG">
                                                <label for="styledejeu">Votre rank MM</label>
                                                <select name="rankmm" id="styledejeu">
                                                    @foreach ($rankmm as $rank)
                                                        <option
                                                            value="{{ $rank->label }}"
                                                        @if(isset($rankMmUser))
                                                            {{ $rank->label == $rankMmUser->label ? 'selected' : '' }}
                                                            @endif
                                                        >
                                                            {{$rank->label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="item-formEditInfoG">
                                                <label for="heures">Votre nombre d'heures</label>
                                                <input type="number" name="heurescsgo" id="heures"
                                                       placeholder="Votre nombre d'heures de jeu"
                                                       class="input-heures-jeu"
                                                       value="@if(isset($user->heures_csgo)){{$user->heures_csgo}}@endif">
                                            </div>
                                            <div class="item-formEditInfoG">
                                                <label for="styledejeu">Votre style de jeu</label>
                                                <div class="checkbox-formEditInfoG">
                                                    @foreach ($styleDeJeu as $style)
                                                        <div class="checkbox-formEditInfoG-item">
                                                            <input type="checkbox" id="{{ $style->label }}"
                                                                   name="styledejeu[]" value="{{ $style->label }}">
                                                            <label
                                                                for="{{ $style->label }}">{{ $style->label }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="item-formEditInfoG">
                                                <label for="rolect">Vos rôles préférés en CT</label>
                                                <div class="checkbox-formEditInfoG">
                                                    @foreach ($roleFavCt as $roleCt)
                                                        <div class="checkbox-formEditInfoG-item">
                                                            <input type="checkbox" id="{{ $roleCt->label }}"
                                                                   name="roleCt[]" value="{{ $roleCt->label }}">
                                                            <label
                                                                for="{{ $roleCt->label }}">{{ $roleCt->label }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="item-formEditInfoG">
                                                <label for="rolet">Vos rôles préférés en T</label>
                                                <div class="checkbox-formEditInfoG">
                                                    @foreach ($roleFavT as $roleT)
                                                        <div class="checkbox-formEditInfoG-item">
                                                            <input type="checkbox" id="{{ $roleT->label }}"
                                                                   name="roleT[]" value="{{ $roleT->label }}">
                                                            <label
                                                                for="{{ $roleT->label }}">{{ $roleT->label }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="item-formEditInfoG">
                                                <label for="maps">Vos maps les plus jouées</label>
                                                <div class="checkbox-formEditInfoG">
                                                    @foreach ($maps as $map)
                                                        <div class="checkbox-formEditInfoG-item">
                                                            <input type="checkbox" id="{{ $map->label }}"
                                                                   name="mapsPlusJouees[]" value="{{ $map->label }}"
                                                                   @if(in_array($map->label, $labelMapsPreferees)) checked @endif>
                                                            <div class="flex gap-4">
                                                                <label for="{{ $map->label }}"><img
                                                                        src="{{$map->logo}}"></label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="item-formEditInfoG">
                                                <label for="maps">Vos maps les moins jouées</label>
                                                <div class="checkbox-formEditInfoG">
                                                    @foreach ($maps as $map)
                                                        <div class="checkbox-formEditInfoG-item">
                                                            <input type="checkbox" id="moins{{ $map->label }}"
                                                                   name="mapsMoinsJouees[]"
                                                                   value="{{ $map->label }}"
                                                                   @if(in_array($map->label, $labelMapsMoinsJouees)) checked @endif>
                                                            <div class="flex gap-4">
                                                                <label for="moins{{ $map->label }}"><img
                                                                        src="{{$map->logo}}"></label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <button>modifier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="body-profile-csgo-info-faceit">
                                <img class="banner-faceit"
                                     src="https://i.ibb.co/hYtffk7/Capture-d-cran-2023-02-03-161339.png">
                                @if(empty($faceit) || !isset($faceit->games->csgo))
                                    @if (!isset($faceit->games->csgo) AND !empty($userPublic->pseudo_faceit))
                                        <a href="{{route('faceit.login')}}" class="faceitLogIn">
                                            <img src="https://i.postimg.cc/9fNmYjQv/unnamed.png"
                                                 class="imgFaceitLogin">
                                            <p>changer de compte</p>
                                        </a>
                                        <p class="errorFaceit">{{$errorNotGameCsgo}}</p>
                                        <div class="faceit-infos">
                                            <img src="{{$faceit->avatar}}" class="avatarFaceit">
                                            <a href="https://www.faceit.com/{{$faceit->settings->language}}/players/{{$faceit->nickname}}"
                                               target="_blank">{{$faceit->nickname}}</a>
                                        </div>
                                    @else
                                        <a href="{{route('faceit.login')}}" class="faceitLogIn">
                                            <img src="https://i.postimg.cc/9fNmYjQv/unnamed.png"
                                                 class="imgFaceitLogin">
                                            <p>se connecter</p>
                                        </a>
                                    @endif
                                @else
                                    <div class="faceit-infos">
                                        <img src="{{$faceit->avatar}}" class="avatarFaceit">
                                        <a href="https://www.faceit.com/{{$faceit->settings->language}}/players/{{$faceit->nickname}}"
                                           target="_blank">{{$faceit->nickname}}</a>
                                        <div class="faceit-infos-stats">
                                            <div class="faceit-items-infos-stats">
                                                <div class="label-stats-faceit">
                                                    <p><i class="fa-solid fa-ranking-star"></i> Elo</p>
                                                </div>
                                                <div class="value-stats-faceit">
                                                    <img src="{{$lvlImg}}" class="imgLvlImg">
                                                    <p>{{$faceit->games->csgo->faceit_elo}}</p>
                                                </div>
                                            </div>
                                            <div class="faceit-items-infos-stats">
                                                <div class="label-stats-faceit">
                                                    <p><i class="fa-solid fa-gamepad"></i> Matches</p>
                                                </div>
                                                <div class="value-stats-faceit">
                                                    <p>{{$faceitStats->lifetime->Matches}}</p>
                                                </div>
                                            </div>
                                            <div class="faceit-items-infos-stats">
                                                <div class="label-stats-faceit">
                                                    <p><i class="fa-solid fa-trophy"></i> WR</p>
                                                </div>
                                                <div class="value-stats-faceit">
                                                    <p><?= $faceitStats->lifetime->{'Win Rate %'}; ?>%</p>
                                                </div>
                                            </div>
                                            <div class="faceit-items-infos-stats">
                                                <div class="label-stats-faceit">
                                                    <p><i class="fa-solid fa-gun"></i> K/D</p>
                                                </div>
                                                <div class="value-stats-faceit">
                                                    <p><?= round($faceitStats->lifetime->{'K/D Ratio'} / $faceitStats->lifetime->Matches, 2); ?></p>
                                                </div>
                                            </div>
                                            <div class="faceit-items-infos-stats">
                                                <div class="label-stats-faceit">
                                                    <p><i class="fa-solid fa-crosshairs"></i> HS</p>
                                                </div>
                                                <div class="value-stats-faceit">
                                                    <p><?= round($faceitStats->lifetime->{'Total Headshots %'} / $faceitStats->lifetime->Matches, 2); ?>
                                                        %</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="onglet-rl" id="onglet-rl">
                        <h2>Informations Rocket League</h2>
                    </div>
                </div>
                <div class="block-profile-histo">
                    <h2>Tournois</h2>
                </div>
            </div>
        </div>
    </div>
    <script>
        const toggleInfoPv = document.getElementById("toggleInfoPv");
        const infosg = document.getElementById("infos-g");
        const infospublic = document.getElementById("infos-public");
        const bodyinfosg = document.getElementById("body-infos-g");
        const toggleFormEditInfoPv = document.getElementById("toggleFormEditInfoPv");
        const formEditInfoPv = document.getElementById("formEditInfoPv");
        toggleInfoPv.addEventListener("click", function () {
            if (infosg.style.display === "block") {
                infosg.style.display = "none";
                infospublic.style.display = "block";
                bodyinfosg.style.display = "flex";
                formEditInfoPv.style.display = "none";
                toggleFormEditInfoPv.classList.remove("fa-xmark");
                toggleFormEditInfoPv.classList.add("fa-pen-to-square");
                toggleInfoPv.style.backgroundColor = "#3b3b3b";
            } else {
                infosg.style.display = "block";
                infospublic.style.display = "none";
                toggleInfoPv.style.backgroundColor = "rgb(25, 25, 25)";
            }
        });
        toggleFormEditInfoPv.addEventListener("click", function () {
            if (formEditInfoPv.style.display === "block") {
                formEditInfoPv.style.display = "none";
                toggleFormEditInfoPv.classList.remove("fa-xmark");
                toggleFormEditInfoPv.classList.add("fa-pen-to-square");
                bodyinfosg.style.display = "flex";
            } else {
                formEditInfoPv.style.display = "block";
                toggleFormEditInfoPv.classList.remove("fa-pen-to-square");
                toggleFormEditInfoPv.classList.add("fa-xmark");
                bodyinfosg.style.display = "none";
            }
        });
        window.addEventListener("load", function () {
            if (window.location.href === "http://127.0.0.1:8000/profile/{{$userPublic->name}}#onglet-rl") {
                window.location.replace(window.location.href.split("#onglet-rl")[0]);
            }
            if (window.location.href === "http://127.0.0.1:8000/profile/{{$userPublic->name}}#onglet-csgo") {
                window.location.replace(window.location.href.split("#onglet-csgo")[0]);
            }
        });
        document.getElementById("csgo").addEventListener("click", function () {
            document.querySelector("#csgo").style.backgroundColor = "#232323";
            document.querySelector("#rocketleague").style.backgroundColor = "#3b3b3b";
            document.querySelector("#onglet-csgo").style.display = "block";
            document.querySelector("#onglet-rl").style.display = "none";
        });

        document.getElementById("rocketleague").addEventListener("click", function () {
            document.querySelector("#csgo").style.backgroundColor = "#3b3b3b";
            document.querySelector("#rocketleague").style.backgroundColor = "#232323";
            document.querySelector("#onglet-csgo").style.display = "none";
            document.querySelector("#onglet-rl").style.display = "block";
        });
    </script>
</x-app-layout>
