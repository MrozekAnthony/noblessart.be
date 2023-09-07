@props(['galleries'])

<div class="w-90 mx-auto h-[calc(100vh-240px)] overflow-y-auto">
    <div x-data="{
        openModal: false,
        isEdit: false,
        currentPost: {
            id: '',
            title: '',
            content: '',
            category_id: '',
            image: ''
        },
        confirmDelete(postId) {
            if (confirm('Voulez-vous vraiment supprimer ce blog ?')) {
                document.getElementById('postToDelete').value = postId;
                document.getElementById('deleteForm').submit();
            }
        }
    }">
        <section class="text-gray-600 body-font">
            <h1 class="text-3xl text-center p-5">Liste des Galeries</h1>

            <!-- Bouton pour ajouter une galerie -->
            <button @click="openModal=true; isEdit=false;"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 m-5 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                Ajouter une galerie
            </button>

            <div class="container px-5 py-24 bg-white">
                <div class="flex flex-wrap -m-4">
                    @forelse($galleries as $gallery)
                        <div class="p-4 lg:w-1/3">
                            <!-- Carousel for each gallery -->
                            <div>
                                @foreach ($gallery->images as $image)
                                    <img src="{{ asset($image->image) }}" alt="image in gallery">
                                @endforeach
                            </div>

                            <a href="#">
                                <h2 class="tracking-widest text-md title-font font-medium text-gray-400 mb-1">
                                    {{ $gallery->title }}
                                </h2>
                            </a>
                        </div>
                    @empty
                        <p>Aucune galerie disponible</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Modal pour ajouter une galerie -->
        <div x-show="openModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div @click.away="openModal = false"
                class="bg-white w-2/3 rounded shadow-lg p-8 m-4 max-h-full overflow-y-auto text-center">
                <h2 class="text-2xl font-bold mb-4">Ajouter une galerie</h2>
                <!-- Formulaire pour ajouter une galerie -->
                <!-- Modal pour ajouter une galerie -->
                <div x-show="openModal"
                    class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                    <div @click.away="openModal = false"
                        class="bg-white w-2/3 rounded shadow-lg p-8 m-4 max-h-full overflow-y-auto text-center">
                        <h2 class="text-2xl font-bold mb-4">Ajouter une galerie</h2>

                        <!-- Formulaire pour ajouter une galerie -->
                        <form
                            :action="isEdit ? '/dashboard/galerie/modifier' + currentGallery.id : '/dashboard/galerie/creer'"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="block text-sm font-bold mb-2">Titre de la galerie:</label>
                                <input type="text" name="title" class="w-full p-2 border rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="images" class="block text-sm font-bold mb-2">Images:</label>
                                <input type="file" name="images[]" class="w-full p-2 border rounded" multiple>
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-500 text-white p-2 rounded mt-4">Ajouter</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Ajoutez ici le script pour le carrousel, comme Slick ou Owl Carousel, ou tout autre plugin de votre choix -->
