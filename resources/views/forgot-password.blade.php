@extends('base')

@section('content')
    <div class="flex p-8 my-8 w-2/3 h-[calc(50vh)] mx-auto">

        <!-- Image sur le côté gauche -->
        <div class="hidden lg:block flex-none w-1/3 mr-8">
            <img src="https://dummyimage.com/300x200/cccccc/000000" alt="Image de démonstration" class="max-h-full w-full">
        </div>

        <!-- Formulaire sur le côté droit -->
        <div class="flex-grow">
            <form id="forgotPasswordForm" action="/mot-de-passe-oublie" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" class="w-full p-2 border rounded" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <p class="text-sm mb-2">Veuillez saisir votre adresse e-mail. Un nouveau mot de passe vous sera assigné.
                    </p>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Réinitialiser le mot de
                    passe</button>
            </form>
        </div>

    </div>
@endsection
