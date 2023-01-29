<div class="navlinks-sign">
    <div class="navlinks-textLogo">
        <a href="/login">
            <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
            {{ __('Se connecter') }}
        </x-nav-link>
    </div>
    <div class="navlinks-textLogo">
        <a href="/register"><i class="fa-solid fa-user-plus"></i></a>
        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
            {{ __('S\'inscrire') }}
        </x-nav-link>
    </div>
</div>
