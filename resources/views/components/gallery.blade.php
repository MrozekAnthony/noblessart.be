@props(['galleries'])

<div class="w-90 mx-auto h-[calc(100vh-240px)] overflow-y-auto">
    <div x-data="{
        openModal: false,
        confirmDelete(galleryId) {
    
            if (confirm('Voulez-vous vraiment supprimer cette galerie ?')) {
                document.getElementById('galleryToDelete').value = galleryId;
                document.getElementById('deleteForm').submit();
            }
        }
    }">

        <section class="text-gray-600 body-font">
            <h1 class="text-3xl text-center p-5">Liste des Galeries</h1>

            <!-- Bouton pour ajouter une galerie -->
            <button @click="openModal=true;"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 m-5 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                Ajouter une galerie
            </button>

            <div class="container px-5 py-24 bg-white">
                <div class="flex flex-wrap -m-4">
                    @forelse($galleries as $gallery)
                        <div class="p-4 lg:w-1/3">


                            <!-- Carousel for each gallery -->
                            <div class="gallery-carousel">

                                <!-- Icone de poubelle pour supprimer la galerie -->
                                <button @click="confirmDelete({{ $gallery->id }})"
                                    class="text-red-500 hover:text-red-700">
                                    <img src="{{ asset('image/crayon.svg') }}" alt="trash icon" class="w-8 h-8">
                                </button>
                                <div x-data="carousel()" class="relative w-64 h-64">
                                    <div class="carousel-container overflow-hidden relative w-full h-full">

                                        <!-- Slides -->
                                        <div class="carousel-slides absolute flex transition-transform duration-500 ease-in-out"
                                            :style="'transform: translateX(-' + (100 * activeIndex) + '%)'">
                                            @forelse ($gallery->images as $image)
                                                <div class="min-w-full">
                                                    <img src="{{ asset($image->image) }}" alt="image in gallery"
                                                        class="w-64 h-64">
                                                </div>
                                                <!-- Previous Button -->
                                                <button @click="prevSlide({{ count($image) }})"
                                                    class="absolute top-1/2 left-0 z-10 bg-white bg-opacity-50 px-2 py-1 rounded-r-lg focus:outline-none">
                                                    ‹
                                                </button>

                                                <!-- Next Button -->
                                                <button @click="nextSlide({{ count($image) }})"
                                                    class="absolute top-1/2 right-0 z-10 bg-white bg-opacity-50 px-2 py-1 rounded-l-lg focus:outline-none">
                                                    ›
                                                </button>

                                            @empty
                                                nodata
                                            @endforelse
                                        </div>


                                    </div>
                                </div>
                            </div>


                            <a href="#">
                                <h2 class="tracking-widest text-md title-font font-medium text-gray-400 mb-1">
                                    {{ $gallery->title }}
                                </h2>
                            </a>
                        </div>

                        <!-- Formulaire caché pour la suppression -->
                        <form id="deleteForm" method="POST"
                            :action="'/dashboard/galerie/supprimer/' + {{ $gallery->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="gallery_id" id="galleryToDelete">
                        </form>

                    @empty
                        <div class="flex flex-col items-center justify-center h-64 mx-auto">
                            <img src="{{ asset('image/Oops.svg') }}" alt="Empty Gallery" class="w-32 h-21 opacity-70">
                            <!-- Optionnel : Vous pouvez ajouter une icône ou une illustration représentative -->
                            <p class="text-gray-600 text-center">Il semble qu'aucune galerie ne soit disponible pour le
                                moment.</p>
                            <button @click="openModal=true;"
                                class="mt-4 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">
                                Ajouter une galerie
                            </button>
                        </div>

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
                        <form action="/dashboard/galerie/creer" method="POST" enctype="multipart/form-data">
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
    <script>
        function carousel() {
            return {
                activeIndex: 0,
                nextSlide(nbImage = 0) {
                    if (this.activeIndex < nbImage
                    } - 1) this.activeIndex++;
            },
            prevSlide() {
                if (this.activeIndex > 0) this.activeIndex--;
            }
        }
        }
    </script>
</div>


<!-- Ajoutez ici le script pour le carrousel, comme Slick ou Owl Carousel, ou tout autre plugin de votre choix -->
