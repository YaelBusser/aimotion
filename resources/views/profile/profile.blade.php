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
                        <div class="body-profile-csgo">
                            <div class="body-profile-csgo-info-g">
                                <div class="block-icon-edit-info-g">
                                    @if ($user->name == $userPublic->name)
                                        <i id="toggleInfoPublic"
                                           class="fa-solid fa-pen-to-square icon-edit-info-g"></i>
                                    @endif
                                </div>
                                <div class="infos-public" id="infos-public">
                                    <div id="body-infos-public">
                                        <div class="block-infos-g" id="block-infos-g">
                                            <form method="post" action="/profile/infoPublic/csgo"
                                                  class="flex-column gap-3 mt-6" id="formCsgo">
                                                <div class="item-formEditInfoG">
                                                    <h3>Description</h3>
                                                    <p class="csgo-public-info">
                                                        @if (!empty($userPublic->csgo_description))
                                                            {{$userPublic->csgo_description}}
                                                        @endif
                                                    </p>
                                                    <div class="formEditInfoPublic editCsgoForm">
                                                        @csrf
                                                        <textarea name="csgo-description" id="csgo-description"
                                                                  class="textarea-form-public">@if(isset($user->csgo_description))
                                                                {{$user->csgo_description}}
                                                            @endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="item-formEditInfoG">
                                                    <h3>Set Up - Equipement</h3>
                                                    <div class="item-csgo-setup">
                                                        <h4>Casque</h4>
                                                        <p class="csgo-public-info">@if (!empty($userPublic->csgo_casque))
                                                                {{$userPublic->csgo_casque}}
                                                            @endif
                                                        </p>
                                                        <div class="formEditInfoPublic editCsgoForm">
                                                            @csrf
                                                            <input type="text" name="csgo-casque"
                                                                   class="input-form-public"
                                                                   value="@if(isset($user->csgo_casque)){{$user->csgo_casque}}@endif">
                                                            @if ($errors->has('csgo-casque'))
                                                                <x-input-error :messages="$errors->get('csgo-casque')" class="mt-2 test"/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-3 justify-between">
                                                        <div class="item-csgo-setup w-1/2">
                                                            <h4>Clavier</h4>
                                                            <p class="csgo-public-info">@if (!empty($userPublic->csgo_clavier))
                                                                    {{$userPublic->csgo_clavier}}
                                                                @endif
                                                            </p>
                                                            <div class="formEditInfoPublic editCsgoForm">
                                                                @csrf
                                                                <input type="text" name="csgo-clavier"
                                                                       class="input-form-public"
                                                                       value="@if(isset($user->csgo_clavier)){{$user->csgo_clavier}}@endif">
                                                            </div>
                                                        </div>
                                                        <div class="item-csgo-setup w-1/2">
                                                            <h4>Souris</h4>
                                                            <p class="csgo-public-info">@if (!empty($userPublic->csgo_souris))
                                                                    {{$userPublic->csgo_souris}}
                                                                @endif
                                                            </p>
                                                            <div class="formEditInfoPublic editCsgoForm">
                                                                @csrf
                                                                <input type="text" name="csgo-souris"
                                                                       class="input-form-public"
                                                                       value="@if(isset($user->csgo_souris)){{$user->csgo_souris}}@endif">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-3 justify-between">
                                                        <div class="item-csgo-setup w-1/2">
                                                            <h4>DPI</h4>
                                                            <p class="csgo-public-info">@if (!empty($userPublic->csgo_DPI))
                                                                    {{$userPublic->csgo_DPI}}
                                                                @endif
                                                            </p>
                                                            <div class="formEditInfoPublic editCsgoForm">
                                                                @csrf
                                                                <input type="text" name="csgo-dpi"
                                                                       class="input-form-public"
                                                                       value="@if(isset($user->csgo_DPI)){{$user->csgo_DPI}}@endif">
                                                            </div>
                                                        </div>
                                                        <div class="item-csgo-setup w-1/2">
                                                            <h4>Sensibilité</h4>
                                                            <p class="csgo-public-info">@if (!empty($userPublic->csgo_sensi))
                                                                    {{$userPublic->csgo_sensi}}
                                                                @endif
                                                            </p>
                                                            <div class="formEditInfoPublic editCsgoForm">
                                                                @csrf
                                                                <input type="text" name="csgo-sensi"
                                                                       class="input-form-public"
                                                                       value="@if(isset($user->csgo_sensi)){{$user->csgo_sensi}}@endif">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-csgo-setup">
                                                        <h4>Ecran</h4>
                                                        <p class="csgo-public-info">@if (!empty($userPublic->csgo_ecran))
                                                                {{$userPublic->csgo_ecran}}
                                                            @endif
                                                        </p>
                                                        <div class="formEditInfoPublic editCsgoForm">
                                                            @csrf
                                                            <input type="text" name="csgo-ecran"
                                                                   class="input-form-public"
                                                                   value="@if(isset($user->csgo_ecran)){{$user->csgo_ecran}}@endif">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn-csgo-public" id="btn-csgo-public">modifier</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="body-profile-csgo-info-faceit">
                                <img class="banner-faceit"
                                     src="https://i.ibb.co/hYtffk7/Capture-d-cran-2023-02-03-161339.png">
                                @if(empty($faceit) || !isset($faceit->games->csgo))
                                    @if($userPublic->name != $user->name)
                                        <p class="text-center">Ce joueur n'a pas de compte faceit.</p>
                                    @else
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

        const toggleInfoPublic = document.getElementById("toggleInfoPublic");
        const csgoPublicInfo = document.getElementsByClassName("csgo-public-info");
        const editCsgoForm = document.getElementsByClassName("editCsgoForm");
        const btnCsgoPublic = document.getElementById("btn-csgo-public");
        toggleInfoPublic.addEventListener("click", function () {
            if (toggleInfoPublic.classList.contains('fa-xmark')) {
                for (let i = 0; i < csgoPublicInfo.length; i++) {
                    csgoPublicInfo[i].style.display = "block";
                }
                for (let i = 0; i < editCsgoForm.length; i++) {
                    editCsgoForm[i].style.display = "none";
                }
                btnCsgoPublic.style.display = "none";
                toggleInfoPublic.classList.remove("fa-xmark");
                toggleInfoPublic.classList.add("fa-pen-to-square");
            } else {
                for (let i = 0; i < csgoPublicInfo.length; i++) {
                    csgoPublicInfo[i].style.display = "none";
                }
                for (let i = 0; i < editCsgoForm.length; i++) {
                    editCsgoForm[i].style.display = "block";
                }
                btnCsgoPublic.style.display = "block";
                toggleInfoPublic.classList.remove("fa-pen-to-square");
                toggleInfoPublic.classList.add("fa-xmark");
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
    </script>
</x-app-layout>
