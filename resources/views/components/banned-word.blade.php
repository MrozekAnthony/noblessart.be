@props(['bannedWords', 'severities'])

<div class="bg-white p-4 rounded shadow-md h-[calc(100vh-240px)] overflow-y-auto">
    <h2 class="text-xl mb-4">Mots bannis</h2>
    <form class="my-4" method="POST" action="/dashboard/mot-interdit/creer">
        @csrf
        <div class="flex items-center space-x-4">
            <input type="text" id="word" name="word" placeholder="Nouveau mot à bannir"
                class="border rounded p-1 flex-grow">
            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Ajouter</button>
        </div>
        <select name="severity_id"
            class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline-blue focus:border-blue-300">
            <option value="">Sélectionner une gravité</option>
            @foreach ($severities as $severity)
                <option value="{{ $severity->id }}" {{ request('severity_id') == $severity->id ? 'selected' : '' }}>
                    {{ $severity->name }}
                </option>
            @endforeach
        </select>

    </form>


    <table class="border-2 w-full">
        <th>
            Mot
        </th>
        <th>
            Sévérité
        </th>
        <th>
            Action
        </th>
        @foreach ($bannedWords as $index => $word)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : '' }}">
                <td class="border p-2 text-center">
                    {{ $word->word }}
                </td>
                <td class="border p-2 text-center">
                    {{ $word->severity->name }}
                </td>
                <td class="border p-2 text-center">
                    <form action="/dashboard/mot-interdit/supprimer/{{ $word->id }}" method="POST"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer ce mot ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


</div>
