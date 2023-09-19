@props(['post'])

@extends('base')

@section('content')
    <div class="w-90 mx-auto">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex h-full p-10">
                <section class="text-gray-600 body-font overflow-hidden">
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
                </section>
            </div>
        </section>
    </div>
@endsection
