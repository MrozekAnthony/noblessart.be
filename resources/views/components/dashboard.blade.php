<div class="text-center">
    <h1 class="text-3xl">Bienvenue sur votre profil, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
    <p class="text-xl">Vous êtes connecté en tant que {{ \Illuminate\Support\Facades\Auth::user()->role->name }}</p>
</div>


<div class="w-full max-w-xl mx-auto mt-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-6 text-2xl font-bold">Modifier mes données</h2>

        <form action="/dashboard/utilisateur/modifier/{{ \Illuminate\Support\Facades\Auth::user()->id }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nom
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Mot de passe (laissez vide pour garder le même)
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" name="password" value="">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Image
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="image" type="file" name="image">
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
