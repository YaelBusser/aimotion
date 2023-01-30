<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Informations du profil') }}
        </h2>

        <p class="mt-1 text-sm">
            {{ __("Mettre à jour vos informations de compte") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 form-edit-profile"
          enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="block-edit-profile-avatar">
            <div class="avatar-edit">
                <img src="{{ $user->avatar }}">
                <x-text-input name="avatar" type="file" class="mt-1 block w-full" :value="old('name', $user->name)"
                              autofocus autocomplete="name"/>
                <i class="fa-sharp fa-solid fa-circle-plus"></i>
                <x-input-error class="mt-2" :messages="$errors->get('avatar')"/>
            </div>
        </div>
        <div>
            <x-input-label for="name" :value="__('Pseudo')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                          required autofocus autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          :value="old('email', $user->email)" required autocomplete="email"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')"/>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2">
                        {{ __('Votre email n\'est pas vérifiée.') }}

                        <button form="send-verification"
                                class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 block-edit-profile-btn">
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm"
                >{{ __('Modifié') }}</p>
            @endif
            <x-primary-button>{{ __('modifier') }}</x-primary-button>

        </div>
    </form>
</section>
