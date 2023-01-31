<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Supprimer le compte') }}
        </h2>

        <p class="mt-1 text-sm">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger les données ou informations que vous souhaitez conserver.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Supprimer le compte') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 form-edit-profile">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
            </h2>

            <p class="mt-1 text-sm">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
            </p>
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center">
                <div class="mt-6">
                    <x-input-label for="password" value="Password" class="sr-only"/>
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-full"
                        placeholder="Mot de passe"
                    />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2"/>
                </div>

                <div class="mt-6">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Annuler') }}
                    </x-secondary-button>

                    <x-danger-button>
                        {{ __('Supprimer le compte') }}
                    </x-danger-button>
                </div>
            </div>
        </form>
    </x-modal>
</section>
