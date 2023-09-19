@props(['threads'])

@extends('base')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Forum</h1>
        <a href="{{ route('thread.create') }}" class="block text-center bg-blue-500 text-white px-3 py-1 rounded mb-4">Créer
            un nouveau sujet</a>

        <div class="bg-white p-4 rounded shadow">
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
                        <a class="cursor-pointer" href="">
                            <tr>
                                <td class="py-2 px-4 border">{{ $thread->title }}</td>
                                <td class="py-2 px-4 border">{{ $thread->user->name }}</td>
                                <td class="py-2 px-4 border">{{ $thread->category->name }}</td>
                            </tr>
                        </a>
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
@endsection
