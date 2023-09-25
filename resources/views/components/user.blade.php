@props(['users', 'roles'])

<div class="w-90 mx-auto h-[calc(100vh-240px)] overflow-y-auto">
    <div x-data="{
        openModal: false,
        isEdit: false,
        currentUser: {
            id: '',
            name: '',
            email: '',
            role_id: '',
            image: ''
        },
        confirmDelete(userId) {
            if (confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) {
                document.getElementById('userToDelete').value = userId;
                document.getElementById('deleteForm').submit();
            }
        }
    }">
        <!-- Section de la liste des utilisateurs -->
        <section class="text-gray-600 body-font">
            <h1 class="text-3xl text-center p-5">Liste des utilisateurs</h1>

            <!-- Bouton Ajouter -->
            <button @click="openModal = true"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 m-5 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                Ajouter un utilisateur
            </button>

            <div class="flex flex-wrap -m-4">
                @forelse($users as $user)
                    <!-- Carte Utilisateur -->
                    <div class="lg:w-1/4 md:w-1/3 p-4">
                        <div class="h-full border-2 border-gray-200 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                                src="{{ asset($user->image) }}" alt="team">
                            <div class="p-6">
                                <h2 class="text-gray-900 title-font font-medium">{{ $user->name }}</h2>
                                <p class="leading-relaxed">{{ $user->role->name }}</p>
                                <button
                                    @click="currentUser = {
                                id: '{{ $user->id }}', 
                                name: '{{ $user->name }}',
                                email: '{{ $user->email }}',
                                role_id: '{{ $user->role_id }}',
                                image: '{{ asset($user->image) }}'
                            }; openModal = true; isEdit = true;"
                                    class="text-indigo-500 inline-flex items-center mt-3">Modifier
                                    <!-- Vous pouvez ajouter une icône de modification ici si vous le souhaitez -->
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Placeholder pour la liste vide -->
                    <div class="flex flex-col items-center justify-center h-64 mx-auto w-full">
                        <img src="{{ asset('image/Oops.svg') }}" alt="Empty users" class="w-32 h-21 opacity-70">
                        <p class="text-gray-600 text-center">Il semble qu'aucun utilisateurs ne soit disponible pour le
                            moment.</p>
                        <button @click="openModal = true"
                            class="mt-4 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">
                            Ajouter un utilisateur
                        </button>
                    </div>
                @endforelse
            </div>
        </section>
        <div x-show="openModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div @click.away="openModal = false"
                class="bg-white w-2/3 rounded shadow-lg p-8 m-4 max-h-screen overflow-y-auto text-center">
                <div x-show="isEdit">
                    <button @click="confirmDelete(currentUser.id)" class="text-red-500 hover:text-red-700">
                        Supprimer ?
                    </button>
                </div>
                <h2 class="text-2xl font-bold mb-4"
                    x-text="isEdit ? 'Modifier l\'utilisateur' : 'Ajouter un utilisateur'"></h2>
                <form
                    :action="isEdit ? '/dashboard/utilisateur/modifier/' + currentUser.id : '/dashboard/utilisateur/creer'"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-bold mb-2">Image:</label>
                        <input type="file" name="image" class="w-full p-2 border rounded">

                        <!-- Si currentUser.image est défini et non vide, montrez cette image -->
                        <img x-show="currentUser.image" :src="'..' + currentUser.image" class="mt-4 w-48">

                        <!-- Si currentUser.image n'est pas défini ou vide, montrez l'image par défaut -->
                        <img x-show="!currentUser.image || currentUser.image == ''" src="{{ asset('image/Oops.svg') }}"
                            class="mt-4 w-48">


                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-bold mb-2">Titre:</label>
                        <input x-model="currentUser.name" type="text" name="name"
                            class="w-full p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="role_id" class="block text-sm font-bold mb-2">Role:</label>
                        <select name="role_id" x-model="currentUser.role_id" class="w-full p-2 border rounded">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-bold mb-2">Email:</label>
                        <input x-model="currentUser.email" type="text" name="email"
                            class="w-full p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-bold mb-2">Mot de passe:</label>
                        <input type="password" name="password" class="w-full p-2 border rounded"
                            :placeholder="isEdit ? 'Laisser vide pour ne pas changer' : ''">
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded mt-4">Soumettre</button>
                </form>
                <!-- Formulaire caché pour la suppression -->
                <form id="deleteForm" method="POST" :action="'/dashboard/utilisateur/supprimer/' + currentUser.id"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="user_id" id="userToDelete">
                </form>

            </div>
        </div>
    </div>
</div>
