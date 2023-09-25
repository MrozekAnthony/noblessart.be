@extends('base')

@section('content')
    <div class="flex p-8 my-8 w-2/3 h-[calc(50vh)] mx-auto">


        <!-- Formulaire sur le côté droit -->
        <div class="flex-grow">
            <form id="loginForm" action="{{ route('auth.doRegister') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-bold mb-2">Nom:</label>
                    <input type="text" name="name" class="w-full p-2 border rounded" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" class="w-full p-2 border rounded" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-bold mb-2">Mot de passe:</label>
                    <input type="password" name="password" class="w-full p-2 border rounded" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-bold mb-2">Confirmer le mot de passe:</label>
                    <input type="password" name="password_confirmation" class="w-full p-2 border rounded" required>
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Se connecter</button>
            </form>
        </div>

    </div>
@endsection
