@props(['threads'])

@extends('base')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Forum</h1>

        <div class="bg-white p-4 rounded shadow">
            @foreach ($threads as $thread)
                <div class="mb-4 p-4 bg-white rounded shadow">
                    <h2 class="text-xl">{{ $thread->title }}</h2>
                    <p class="text-gray-600">{{ $thread->created_at->diffForHumans() }} par {{ $thread->user->name }}</p>
                    <p>{{ $thread->body }}</p>
                </div>
            @endforeach
        </div>

    </div>
@endsection
