@props(['categories'])

@extends('base')

@section('content')
    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 rounded-md shadow-md">
        <h1 class="text-xl font-semibold mb-4">Créer un nouveau thread</h1>

        <form action="#" method="post">
            @csrf <!-- Protection contre les attaques CSRF -->

            <!-- Catégorie -->
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select name="category_id" id="category_id" class="mt-1 p-2 w-full border rounded-md">
                    <!-- Supposons que vous ayez une liste de catégories disponibles -->
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Épinglé -->
            <div class="mb-4 flex">
                <input type="checkbox" name="is_pinned" id="is_pinned" value="1">
                <label for="is_pinned" class="block text-sm font-medium text-gray-700 ml-4">Épingler le thread ?</label>
            </div>

            <!-- Titre -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Contenu -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                <textarea name="content" id="content" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>

            <!-- Bouton de soumission -->
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Créer le thread</button>
            </div>

        </form>

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
@endsection
