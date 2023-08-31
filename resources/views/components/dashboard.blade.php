<div>
    <h1 class="text-3xl">Bienvenue sur votre profil, {{ $user->name }}</h1>
    <p class="text-xl">Vous êtes connecté en tant que {{ $user->role }}</p>
    <p class="text-xl">Votre adresse mail est : {{ $user->email }}</p>
</div>
