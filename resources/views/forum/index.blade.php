@props(['threads', 'error', 'categories'])

@extends('base')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Forum</h1>
        <a href="{{ route('thread.create') }}" class="block text-center bg-blue-500 text-white px-3 py-1 rounded mb-4">Créer
            un nouveau sujet</a>
        <!-- Formulaire de filtrage -->
        <form method="GET" action="{{ route('thread.index') }}" class="mb-4 flex items-center gap-4">
            <input type="text" name="title" placeholder="Titre" value="{{ request('title') }}"
                class="p-1 rounded border flex-1">
            <input type="text" name="author" placeholder="Auteur" value="{{ request('author') }}"
                class="p-1 rounded border flex-1">

            <div class="relative flex-1">
                <select name="category"
                    class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline-blue focus:border-blue-300">
                    <option value="">Sélectionner une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M6.293 9.293a1 1 0 0 1 1.414 0L10 11.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" />
                    </svg>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Filtrer</button>
        </form>

        <div class="bg-white p-4 rounded shadow">
            @isset($error)
                <x-error type="danger" message="{{ $error }}"></x-error>
            @endisset
            <table class="min-w-full bg-white shadow-md rounded-md">
                <thead>
                    <tr class="bg-gray-300 text-gray-700">
                        <th class="py-2 px-4 border">Articles</th>
                        <th class="py-2 px-4 border">Auteur</th>
                        <th class="py-2 px-4 border">Catégorie</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($threads as $thread)
                        <tr class="cursor-pointer" data-href="/forum/{{ $thread->slug . '-' . $thread->id }}">
                            <td class="py-2 px-4 border">{{ $thread->title }}</td>
                            <td class="py-2 px-4 border">{{ $thread->user->name }}</td>
                            <td class="py-2 px-4 border">{{ $thread->category->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-2 px-4 border text-center" colspan="4">Aucun sujet</td>
                        </tr>
                    @endforelse
                    <!-- Vous pouvez ajouter d'autres lignes comme la précédente ici -->
                </tbody>
            </table>
        </div>

    </div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('[data-href]').forEach(item => {
                item.addEventListener('click', function() {
                    window.location.href = this.dataset.href;
                });
            });
        });
    </script>
@endsection
