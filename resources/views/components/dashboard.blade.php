<div>
    <h1 class="text-3xl">Bienvenue sur votre profil, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
    <p class="text-xl">Vous êtes connecté en tant que {{ \Illuminate\Support\Facades\Auth::user()->role->name }}</p>
    <p class="text-xl">Votre adresse mail est : {{ \Illuminate\Support\Facades\Auth::user()->email }}</p>
</div>
