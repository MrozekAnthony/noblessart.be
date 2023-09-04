<form id="registerForm" action="/register" method="post" class="hidden">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-bold mb-2">Nom:</label>
        <input type="text" name="name" class="w-full p-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-sm font-bold mb-2">Email:</label>
        <input type="email" name="email" class="w-full p-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block text-sm font-bold mb-2">Mot de passe:</label>
        <input type="password" name="password" class="w-full p-2 border rounded" required>
    </div>
    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">S'inscrire</button>
</form>
