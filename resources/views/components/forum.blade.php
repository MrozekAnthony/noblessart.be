@props(['threads'])

<div class="w-90 mx-auto h-[calc(100vh-240px)] overflow-y-auto">
    <section class="text-gray-600 body-font">
        <h1 class="text-3xl text-center p-5">Liste des insultes dans les forums</h1>
    </section>
    <table class="min-w-full bg-white shadow-md rounded-md">
        <thead>
            <tr class="bg-gray-300 text-gray-700">
                <th class="py-2 px-4 border">Articles</th>
                <th class="py-2 px-4 border">Auteur</th>
                <th class="py-2 px-4 border">Insulte</th>
                <th class="py-2 px-4 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($threads as $thread)
                <form action="/forum/commentaire/stopquarantaine/{{ $thread->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                    <tr>
                        <td class="py-2 px-4 border">{{ $thread->title }}</td>
                        <td class="py-2 px-4 border">{{ $thread->user->name }}</td>
                        <td class="py-2 px-4 border">{{ $thread->content }}</td>
                        <td class="py-2 px-4 border flex justify-center">
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-full">Retirer de la
                                quarantaine</button>
                        </td>
                    </tr>
                </form>
            @empty
                <tr>
                    <td class="py-2 px-4 border text-center" colspan="4">Aucune insulte ✌</td>
                </tr>
            @endforelse
            <!-- Vous pouvez ajouter d'autres lignes comme la précédente ici -->
        </tbody>
    </table>
</div>
