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

                {{-- ici un formulaire pour mettre des commentaires --}}
                <div class="my-8">
                    <h2 class="text-2xl font-bold">Ajouter un commentaire</h2>
                    <div class="mt-5">
                        @auth()
                            <form action="/forum/commentaire/ajouter" method="POST">
                                @csrf
                                <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                <div class="flex flex-col">
                                    <label for="content">Votre commentaire</label>
                                    <textarea name="content" id="content" cols="30" rows="10"
                                        class="max-h-32 border-2 border-gray-300 p-2 mt-2 focus:border-[#e2d239] focus:outline-none"></textarea>
                                </div>
                                <div class="mt-5">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Envoyer</button>
                                </div>
                            </form>
                        @else
                            <div class="text-center">

                                <p>Vous devez être connecté pour poster un commentaire</p>
                                {{-- liens vers la page de connexion --}}
                                <a href="/connexion" class="text-blue-500 hover:underline">Se connecter</a>
                            </div>
                        @endauth
                    </div>
                </div>

                <!-- Status du thread -->
                @if ($thread->is_closed)
                    <p class="text-red-500">Ce thread est fermé depuis le {{ $thread->closed_at->format('d/m/Y') }}</p>
                @else
                    {{-- ici les commentaires --}}
                    <div class="my-8">
                        <h2 class="text-2xl font-bold">Commentaires ({{ count($thread->allComments) }})</h2>
                        <div class="mt-5">
                            @foreach ($thread->comments as $comment)
                                @include('components/comment', [
                                    'comment' => $comment,
                                    'context' => 'forum',
                                ])
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Vue et catégorie -->
                <p><strong>Vues :</strong> {{ $thread->views_count }}</p>
                <p><strong>Catégorie :</strong> {{ $thread->category->name }}</p>
            </div>
        </div>
    </div>
@endsection
