<div class="navlinks-sign">
    <div class="navlinks-textLogo">
        <a href="/logout">
            <i class="fa-solid fa-right-from-bracket"></i></a>
        <x-nav-link :href="route('logout')" :active="request()->routeIs('logout')">
            {{ __('Se déconnecter') }}
        </x-nav-link>
    </div>
</div>
