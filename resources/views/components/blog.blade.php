@props(['blog' => []])
<div x-data="{ openModal: false }" class="w-90 mx-auto h-[calc(100vh-240px)] overflow-y-auto">

    <!-- Section principale -->
    <section class="text-gray-600 body-font">
        <h1 class="text-3xl text-center p-5">Liste des Blog</h1>

        <!-- Bouton pour ouvrir la modal -->
        <button @click="openModal = true"
            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 m-5 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            Ajouter un article
        </button>
        <div class="container px-5 py-24 bg-white ">
            <div class="flex flex-wrap -m-4">
                @forelse($blog as $post)
                    <div class="p-4 lg:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                                src="https://dummyimage.com/720x400" alt="blog">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                    {{ $post->category }}</h2>
                                </h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3"> {{ $post->title }}}
                                </h1>
                                <p class="leading-relaxed mb-3">
                                    {{ $post->content }}
                                </p>
                                <div class="flex items-center flex-wrap ">
                                    <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Lire plus
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <span
                                        class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>{{ $i * rand(1, 5) }}K
                                    </span>
                                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            <path
                                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                            </path>
                                        </svg>
                                        {{ $i }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            </div>
        </div>
    </section>


    <div x-show="openModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" x-cloak>
        <div @click.away="openModal = false" class="bg-white w-2/3 rounded shadow-lg p-8 m-4 max-h-full text-center">
            <h2 class="text-2xl font-bold mb-4">Ajouter un article</h2>
            <form action="/dashboard/blog/creer" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-bold mb-2">Titre:</label>
                    <input type="text" name="title" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-bold mb-2">Catégorie:</label>
                    <input type="text" name="category" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-bold mb-2">Contenu:</label>
                    <textarea name="content" id="mytextarea"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded mt-4">Soumettre</button>
            </form>
        </div>
    </div>

</div>
<script>
    tinymce.init({
        selector: '#mytextarea' // remplacez cette valeur pour cibler un autre textarea
    });
</script>
