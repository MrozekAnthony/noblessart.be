@extends('base')

@section('content')
    <div class="flex p-8 my-8 w-2/3 mx-auto">
        <!-- Formulaire de contact -->
        <div class="flex-grow">
            <form action="/contact" method="post">
                @csrf
                @if (session('message'))
                    <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('message') }}
                    </div>
                @endif
                <h1 class="text-2xl font-bold mb-4">Contactez-nous</h1>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-bold mb-2">Nom:</label>
                    <input type="text" name="name" class="w-full p-2 border rounded"
                        value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" class="w-full p-2 border rounded"
                        value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-bold mb-2">Message:</label>
                    <textarea name="message" rows="5" class="w-full p-2 border rounded" required></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Envoyer</button>
            </form>
        </div>
    </div>
@endsection
