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
                    <div class="onglet-csgo" id="onglet-csgo">
                        <h2>Informations CS:GO</h2>
                        <div class="body-profile-csgo">
                            <div class="body-profile-csgo-info-g">
                                <div class="block-icon-edit-info-g">
                                    <i id="toggleFormIcon" class="fa-solid fa-pen-to-square icon-edit-info-g"></i>
                                </div>
                                <h3>Informations générales</h3>
                                <p>Ces informations sont facultatives, elles sont utiles pour remplir automatiquement les formulaires de recrutement.</p>
                                <div id="infos-g">
                                    <div class="block-infos-g">
                                        <div class="item-formEditInfoG">
                                            <p>Rank MM</p>
                                            <div class="block-logo-map-preferee">
                                                <img src="{{$rankMmUser->logo}}" class="logo-rankmm">
                                            </div>
                                        </div>
                                        <div class="item-formEditInfoG">
                                            <p>Maps les plus jouées</p>
                                            <div class="block-logo-map-preferee">
                                                @foreach($mapsPreferees as $mapsPreferee)
                                                    <img src="{{$mapsPreferee->logo}}" class="logo-map-preferee">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form method="post" action="/profile/infoG/csgo" id="formContainer"
                                      class="formEditInfoG">
                                    @csrf
                                    <div class="body-formEditInfoG">
                                        <div class="block-body-formEditInfoG">
                                            <div class="item-formEditInfoG">
                                                <label for="styledejeu">Votre rank MM</label>
                                                <select name="rankmm">
                                                    @foreach ($rankmm as $rank)
                                                        <option
                                                            value="{{ $rank->label }}" {{ $rank->label == $rankMmUser->label ? 'selected' : '' }}>
                                                            {{$rank->label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="item-formEditInfoG">
                                                <label for="styledejeu">Votre style de jeu</label>
                                                <div class="checkbox-formEditInfoG">
                                                    @foreach ($styleDeJeu as $style)
                                                        <div class="checkbox-formEditInfoG-item">
                                                            <input type="checkbox" id="{{ $style->label }}"
                                                                   name="styledejeu[]" value="{{ $style->label }}">
                                                            <label for="{{ $style->label }}">{{ $style->label }}</label>
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
                                                            <label for="{{ $roleT->label }}">{{ $roleT->label }}</label>
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
                                                                   name="mapsMoinsJouees[]" value="{{ $map->label }}">
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
                                    @if (!isset($faceit->games->csgo) AND !empty($user->pseudo_faceit))
                                        <a href="{{route('faceit.login')}}" class="faceitLogIn">
                                            <img src="https://i.postimg.cc/9fNmYjQv/unnamed.png" class="imgFaceitLogin">
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
                                            <img src="https://i.postimg.cc/9fNmYjQv/unnamed.png" class="imgFaceitLogin">
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
            </div>
            <div class="block-profile-histo">
                <h2>Historique</h2>
            </div>
        </div>
    </div>
    <script>
        const toggleFormIcon = document.getElementById("toggleFormIcon");
        const formContainer = document.getElementById("formContainer");

        toggleFormIcon.addEventListener("click", function () {
            if (formContainer.style.display === "block") {
                formContainer.style.display = "none";
                toggleFormIcon.classList.remove("fa-xmark");
                toggleFormIcon.classList.add("fa-pen-to-square");
                document.getElementById('infos-g').style.display = "block";
            } else {
                formContainer.style.display = "block";
                toggleFormIcon.classList.remove("fa-pen-to-square");
                toggleFormIcon.classList.add("fa-xmark");
                document.getElementById('infos-g').style.display = "none";
            }
        });
        window.addEventListener("load", function () {
            if (window.location.href == "http://127.0.0.1:8000/profile#onglet-rl") {
                window.location.replace(window.location.href.split("#onglet-rl")[0]);
            }
            if (window.location.href == "http://127.0.0.1:8000/profile#onglet-csgo") {
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
