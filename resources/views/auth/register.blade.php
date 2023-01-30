<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('S\'inscrire') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('register') }}" class="form">
        <div class="flex justify-center">
            <x-application-logo class="w-30 rounded-full mb-6"/>
        </div>
        @csrf
        <div class="flex gap-4">
            <div class="mt-4">
                <x-input-label for="name" :value="__('Pseudo')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                              autofocus/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" style="min-width: 195px"/>
            </div>
        </div>
        <!-- Name -->
        <div class="flex gap-4">
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')"/>

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="min-width: 195px"/>
            </div>
        </div>

        <div class="flex gap-4">
            <div class="mt-4">
                <x-input-label for="age" :value="__('Age')"/>

                <x-text-input id="age" class="block mt-1 w-full"
                              type="number"
                              name="age" :value="old('age')"/>

                <x-input-error :messages="$errors->get('age')" class="mt-2"/>
            </div>
            <div class="mt-4">
                <x-input-label for="code" :value="__('Code Postal')"/>

                <x-text-input id="code" class="block mt-1 w-full"
                              type="text"
                              name="codePostal"/>

                <x-input-error :messages="$errors->get('codePostal')" class="mt-2" style="min-width: 195px"/>
            </div>
        </div>
        <div class="mt-4">
            <x-input-label for="ville" :value="__('Ville')"/>
            <select id="ville" name="ville"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </select>
            <x-input-error :messages="$errors->get('ville')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __("s'inscrire") }}
            </x-primary-button>
        </div>
    </form>
    <script>
        document.getElementById("code").addEventListener("change", function () {
            // Récupération de la valeur saisie
            var codePostal = this.value;
            // Appel de l'API avec la valeur saisie
            fetch(`https://apicarto.ign.fr/api/codes-postaux/communes/${codePostal}`)
                .then(response => response.json())
                .then(data => {
                    // Récupération de la liste des villes
                    var villes = data.length;
                    var options = "";
                    // Boucle pour parcourir les villes et les ajouter à la liste déroulante
                    for (var i = 0; i < villes; i++) {
                        options += "<option>" + data[i].libelleAcheminement + "</option>";
                    }
                    // Remplir la liste déroulante avec les options
                    document.getElementById("ville").innerHTML = options;
                });
        });

    </script>
</x-guest-layout>
