@props(['categories'])

<div class="w-90 mx-auto h-[calc(100vh-240px)] overflow-y-auto">
    <div x-data="{
        openModal: false,
        isEdit: false,
        currentCategory: {
            id: '',
            name: '',
            image: ''
        },
        confirmDelete(categoryId) {
            if (confirm('Voulez-vous vraiment supprimer cette catégorie ?')) {
                document.getElementById('categoryToDelete').value = categoryId;
                document.getElementById('deleteForm').submit();
            }
        }
    }">

        <!-- Section principale -->
        <section class="text-gray-600 body-font">
            <h1 class="text-3xl text-center p-5">Liste des catégories</h1>

            <!-- Bouton pour ouvrir la modal -->
            <button @click="openModal=true; isEdit=false; currentCategory = { id: '0', name: '', image: '' }"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 m-5 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                Ajouter une catégorie
            </button>

            <div class="container px-5 py-24 bg-white">
                <div class="flex flex-wrap -m-4">
                    @forelse($categories as $category)
                        <div class="p-4 lg:w-1/3">
                            <div
                                class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden relative">
                                <img class="h-64 md:h-48 lg:h-36 w-full object-center object-cover"
                                    src="{{ $category->image ? asset($category->image) : 'https://dummyimage.com/720x400' }}"
                                    alt="blog">

                                <button
                                    @click="openModal=true; isEdit=true; currentCategory { 
                                    id: '{{ $category->id }}', 
                                    name: '{{ $category->name }}',
                                    image: '{{ $category->image }}'
                                };
                                    class="absolute
                                    top-2 right-2 bg-white p-2 rounded-full hover:bg-gray-200">
                                    <img src="{{ asset('image/crayon.svg') }}" alt="Éditer"
                                        class="w-8 h-8 object-cover object-center">
                                </button>

                                <div class="p-6">
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                        {{ $category->name ?? '' }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center h-64 mx-auto">
                            <img src="{{ asset('image/Oops.svg') }}" alt="Empty blog" class="w-32 h-21 opacity-70">
                            <p class="text-gray-600 text-center">Il semble qu'aucune categorie ne soit disponible pour
                                le
                                moment.</p>
                            <button @click="openModal=true;"
                                class="mt-4 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">
                                Ajouter une catégorie
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Modal (créer/modifier) -->
        <div x-show="openModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div @click.away="openModal = false"
                class="bg-white w-2/3 rounded shadow-lg p-8 m-4 max-h-screen overflow-y-auto text-center">
                <div x-show="isEdit">
                    <button @click="confirmDelete(currentPost.id)" class="text-red-500 hover:text-red-700">
                        Supprimer ?<img src="{{ asset('image/logo.svg') }}" alt="aaa" class="w-16 h-16">
                    </button>
                </div>
                <h2 class="text-2xl font-bold mb-4" x-text="isEdit ? 'Modifier l\'article' : 'Ajouter un article'"></h2>
                <form
                    :action="isEdit ? '/dashboard/categorie/modifier/' + currentCategory.id : '/dashboard/categorie/creer'"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-bold mb-2">Image:</label>
                        <input type="file" name="image" class="w-full p-2 border rounded">
                        <img x-show="currentCategory.image" :src={{ asset('currentCategory.image') }} class="mt-4 w-48">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-bold mb-2">Titre:</label>
                        <input x-model="currentCategory.name" type="text" name="name"
                            class="w-full p-2 border rounded" required>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded mt-4">Soumettre</button>
                </form>
                <!-- Formulaire caché pour la suppression -->
                <form id="deleteForm" method="POST" :action="'/dashboard/categorie/supprimer/' + currentCategory.id"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="category_id" id="categoryToDelete">
                </form>

            </div>
        </div>

    </div>
</div>
