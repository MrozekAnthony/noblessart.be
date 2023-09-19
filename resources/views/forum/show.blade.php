@props(['thread'])


@extends('base')

@section('content')
    <div class="container mx-auto mt-12">
        <!-- Titre du thread -->
        <h1 class="text-3xl mb-4 text-center">Titre : {{ $thread->title }}</h1>

        <!-- Détails du thread -->
        <div class="bg-white p-6 rounded shadow-md">
            <!-- Content -->
            <div class="thread-content mb-6">
                {!! $thread->content !!}
            </div>

            <!-- Informations du bas -->
            <div class="border-t pt-4 mt-4">
                <p><strong>Publié par :</strong> {{ $thread->user->name }} <span class="text-gray-400">le
                        {{ $thread->created_at->format('d/m/Y') }}</span></p>

                <!-- Status du thread -->
                @if ($thread->is_closed)
                    <p class="text-red-500">Ce thread est fermé depuis le {{ $thread->closed_at->format('d/m/Y') }}</p>
                @endif

                <!-- Vue et catégorie -->
                <p><strong>Vues :</strong> {{ $thread->views_count }}</p>
                <p><strong>Catégorie :</strong> {{ $thread->category->name }}</p>
            </div>
        </div>
    </div>
@endsection
