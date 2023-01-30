<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profil') }}
        </h2>
    </x-slot>
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

</x-app-layout>
