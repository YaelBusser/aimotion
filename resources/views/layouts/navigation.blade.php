<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="navbar" data-aos="fade-right" data-aos-duration="1000">
        <x-application-logo class="w-full"/>
        <!-- Navigation Links -->
        <div class="block-navlinks">
            <div class="navlinks">
                <div class="navlinks-profile">
                    <a href="/profile/{{ Auth::user()->name }}"><img src="../{{ Auth::user()->avatar }}"></a>
                    <div class="user-dropdown">
                        <div class="user-name">{{Auth::user()->name }}<i class="fas fa-caret-down"></i></div>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/profile/{{ Auth::user()->name }}">Profil</a>
                            </li>
                            <li>
                                <a href="/logout">
                                    se déconnecter
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-navbar">
                <div class="navlinks-textLogo">
                    <a href="/"><i class="fa-solid fa-house"></i></a>
                    <x-nav-link href="/home" :active="request()->routeIs('home')">
                        {{ __('Accueil') }}
                    </x-nav-link>
                </div>
                <div class="navlinks-textLogo">
                    <a href="/"><i class="fa-solid fa-shield"></i></a>
                    <x-nav-link href="/home" :active="request()->routeIs('home')">
                        {{ __('Admin') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="/" :active="request()->routeIs('')">
                {{ __('Accueil') }}
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <x-responsive-nav-link href="/login" :active="request()->routeIs('login')">
                {{ __('Se connecter') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="/register" :active="request()->routeIs('register')">
                {{ __('s\'inscrire') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
<script>
    const userDropdown = document.querySelector('.user-dropdown');
    const userName = document.querySelector('.user-name');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    let caretDown = userName.getElementsByTagName("i")[0];
    userName.addEventListener('click', function () {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        if (dropdownMenu.style.display === 'block') {
            caretDown.classList.remove("fa-caret-down");
            caretDown.classList.add("fa-caret-up");
        } else {
            caretDown.classList.remove("fa-caret-up");
            caretDown.classList.add("fa-caret-down");
        }

    });
</script>
