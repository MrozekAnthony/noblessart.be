@props(['posts', 'categories'])

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

        <!-- Section principale -->
        <section class="text-gray-600 body-font">
            <h1 class="text-3xl text-center p-5">Liste des Blogs</h1>

            <!-- Bouton pour ouvrir la modal -->
            <button
                @click="openModal=true; isEdit=false; currentPost = { id: '', title: '', content: '', category_id: '', image: '' }"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 m-5 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                Ajouter un article
            </button>

            <div class="container px-5 py-24 bg-white">
                <div class="flex flex-wrap -m-4">
                    @forelse($posts as $post)
                        <div class="p-4 lg:w-1/3">
                            <div
                                class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden relative">
                                <img class="h-64 md:h-48 lg:h-36 w-full object-center object-cover"
                                    src="{{ $post->image ? asset($post->image) : 'https://dummyimage.com/720x400' }}"
                                    alt="blog">




                                <button
                                    @click="openModal=true; isEdit=true; currentPost = { 
                                    id: '{{ $post->id }}', 
                                    title: '{{ $post->title }}', 
                                    content: '{{ $post->content }}', 
                                    category_id: '{{ $post->category_id }}', 
                                    image: '{{ $post->image }}' 
                                };
                                setTimeout(() => {
                                    if(tinymce.get('content-editor')) {
                                        tinymce.get('content-editor').setContent(currentPost.content);
                                    }
                                }, 100)"
                                    class="absolute top-2 right-2 bg-white p-2 rounded-full hover:bg-gray-200">
                                    <img src="{{ asset('image/crayon.svg') }}" alt="Éditer"
                                        class="w-8 h-8 object-cover object-center">
                                </button>

                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                        {{ $post->category->name ?? '' }}
                                    </h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                        {{ $post->title }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center h-64 mx-auto">
                            <img src="{{ asset('image/Oops.svg') }}" alt="Empty blog" class="w-32 h-21 opacity-70">
                            <!-- Optionnel : Vous pouvez ajouter une icône ou une illustration représentative -->
                            <p class="text-gray-600 text-center">Il semble qu'aucun article ne soit disponible pour le
                                moment.</p>
                            <button @click="openModal=true;"
                                class="mt-4 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">
                                Ajouter un article
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
                <form :action="isEdit ? '/dashboard/blog/modifier/' + currentPost.id : '/dashboard/blog/creer'"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-bold mb-2">Image:</label>
                        <input type="file" name="image" class="w-full p-2 border rounded">
                        <img x-show="currentPost.image" :src={{ asset('currentPost.image') }} class="mt-4 w-48">
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-bold mb-2">Titre:</label>
                        <input x-model="currentPost.title" type="text" name="title"
                            class="w-full p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-bold mb-2">Catégorie:</label>
                        <select name="category_id" x-model="currentPost.category_id" class="w-full p-2 border rounded">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-sm font-bold mb-2">Contenu:</label>
                        <textarea id="content-editor" x-model="currentPost.content" name="content" class="w-full p-2 border rounded"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded mt-4">Soumettre</button>
                </form>
                <!-- Formulaire caché pour la suppression -->
                <form id="deleteForm" method="POST" :action="'/dashboard/blog/supprimer/' + currentPost.id"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="post_id" id="postToDelete">
                </form>

            </div>
        </div>

        <!-- Initialisation de TinyMCE -->
        <script>
            tinymce.init({
                selector: 'textarea',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        document.querySelector('textarea').dispatchEvent(new InputEvent('input'));
                    });
                }
            });
        </script>
    </div>
</div>
