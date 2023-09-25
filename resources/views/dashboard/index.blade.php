@extends('base')

@section('content')
    <div class="w-90 mx-auto h-screen overflow-hidden">
        <section class="text-gray-600 body-font">
            <div class="justify-center flex h-full p-10">
                <div class="h-full w-full flex flex-col md:flex-row">
                    <!-- Menu Vertical sur la Gauche -->
                    <div class="bg-white md:w-64 w-full p-6 flex flex-col border-r">
                        <h1 class="text-2xl font-bold mb-6">Mon Dashboard</h1>
                        <nav class="text-center">
                            <a href="/dashboard/"
                                class="{{ $tab === 'dashboard' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Accueil</a>
                            <a href="/dashboard/blog"
                                class="{{ $tab === 'blog' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Blog</a>
                            {{-- <a href="/dashboard/galerie"
                                class="{{ $tab === 'gallery' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Galeries</a> --}}
                            <a href="/dashboard/utilisateur"
                                class="{{ $tab === 'user' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Utilisateurs</a>
                            <a href="/dashboard/categorie"
                                class="{{ $tab === 'category' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Catégories</a>
                            <a href="/dashboard/forum"
                                class="{{ $tab === 'forum' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Forum</a>
                            <a href="/dashboard/mot-interdit"
                                class="{{ $tab === 'banned_word' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Mots
                                interdits</a>
                            {{-- <a href="/dashboard/parametre"
                                class="{{ $tab === 'parameter' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Paramètres</a> --}}
                            <form action="{{ route('auth.logout') }}" method="post"
                                class="text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">
                                @method('delete')
                                @csrf
                                <button type="submit">Se déconnecter</button>
                            </form>
                        </nav>
                    </div>
                    {{-- @foreach ($posts as $post)
                        <p class="text-blue-100">{{ $post->title }}</p>
                        <p class="text-blue-100">{{ $post->category }}</p>
                        <p class="text-blue-100">{{ $post->content }}</p>
                    @endforeach --}}
                    <!-- Contenu Principal -->
                    <div class="flex-1 bg-gray-200 p-6 h-100 mt-6 md:mt-0">
                        @if ($tab == 'dashboard')
                            <x-dashboard></x-dashboard>
                        @elseif($tab == 'blog')
                            <x-blog :posts="$posts" :categories="$categories"></x-blog>
                            {{-- @elseif($tab == 'gallery')
                            <x-gallery :galleries="$galleries"></x-gallery> --}}
                        @elseif($tab == 'user')
                            <x-user :users="$users" :roles="$roles"></x-user>
                        @elseif($tab == 'forum')
                            <x-forum :threads="$threads"></x-forum>
                        @elseif($tab == 'banned_word')
                            <x-banned-word :bannedWords="$bannedWords" :severities="$severities"></x-banned-word>
                        @elseif($tab == 'parameter')
                            <x-parameter></x-parameter>
                            {{-- <x-parameter :parameters="$parameters"></x-parameter> --}}
                        @elseif($tab == 'category')
                            <x-category :categories="$categories"></x-category>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
