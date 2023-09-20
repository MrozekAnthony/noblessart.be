<div class="bg-white p-4 mb-2" x-data="{ showForm: false }">
    <div class="flex items-center mb-2">
        <img src="{{ asset($comment->user->image) }}" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
        <div>
            <h3 class="text-lg font-bold">{{ $comment->user->name }}</h3>
            <p class="text-xs text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
    </div>

    <p class="ml-14 mb-2">{{ $comment->comment }}</p>

    <div class="ml-14">
        <button class="text-sm text-blue-500 hover:underline focus:outline-none"
            @click="showForm = !showForm">Répondre</button>

        <div x-show="showForm" class="mt-2">
            <form action="/blog/commentaire/ajouter" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <textarea name="content" id="content" class="w-full p-2 rounded-md bg-gray-100" placeholder="Votre réponse..."></textarea>
                <button type="submit"
                    class="mt-2 px-4 py-1 bg-blue-500 text-white text-sm rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Envoyer</button>
            </form>
        </div>
    </div>

    @foreach ($comment->replies as $reply)
        <div class="ml-10 mt-2 border-l-2 border-gray-300 pl-4">
            @include('components/comment', ['comment' => $reply])
        </div>
    @endforeach
</div>
