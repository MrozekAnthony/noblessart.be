@props(['post'])

@extends('base')

@section('content')
    <div class="w-90 mx-auto">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex h-full p-10">
                <section class="text-gray-600 body-font overflow-hidden w-full">
                    <div class="container mx-auto bg-white p-5 shadow-lg rounded-lg min-w-full">
                        <!-- Entête avec thumbnail et titre -->
                        <div class="relative">
                            <!-- Image de miniature -->
                            <img src="{{ asset($post->image) }}" alt="Thumbnail" class="w-full h-64 object-cover rounded-t-lg">

                            <!-- Titre superposé -->
                            <div class="absolute bottom-0 w-full bg-gradient-to-t from-black to-transparent text-white p-5">
                                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
                            </div>
                        </div>

                        <!-- Texte du blog en dessous de l'entête -->
                        <div class="mt-5 p-5">
                            {!! $post->content !!}
                        </div>
                    </div>

                    {{-- ici un formulaire pour mettre des commentaires --}}
                    <div class="my-8">
                        <h2 class="text-2xl font-bold">Ajouter un commentaire</h2>
                        <div class="mt-5">
                            @auth()
                                <form action="/blog/commentaire/ajouter" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
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

                    {{-- ici les commentaires --}}
                    <div class="my-8">
                        <h2 class="text-2xl font-bold">Commentaires ({{ count($post->allComments) }})</h2>
                        <div class="mt-5">
                            @foreach ($post->comments as $comment)
                                @include('components/comment', [
                                    'comment' => $comment,
                                    'context' => 'blog',
                                ])
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
