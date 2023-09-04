@extends('base')

@section('content')
    <div class="w-90 mx-auto h-screen overflow-hidden">
        <section class="text-gray-600 body-font">
            <div class="justify-center flex h-full p-10">
                <div class="h-full w-full flex">

                    <!-- Menu Vertical sur la Gauche -->
                    <div class="bg-white w-64 p-6 flex flex-col border-r">
                        <h1 class="text-2xl font-bold mb-6">Mon Dashboard</h1>
                        <nav class="text-center">
                            <a href="/dashboard/"
                                class="{{ $tab === 'dashboard' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Accueil</a>
                            <a href="/dashboard/blog"
                                class="{{ $tab === 'blog' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Blog</a>
                            <a href="/dashboard/galerie"
                                class="{{ $tab === 'gallery' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Galeries</a>
                            <a href="/dashboard/utilisateur"
                                class="{{ $tab === 'user' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Utilisateurs</a>
                            <a href="/dashboard/parametre"
                                class="{{ $tab === 'parameter' ? 'border-b-2 border-[#E2D239] border-solid' : '' }} text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">Paramètres</a>
                            <form action="{{ route('auth.logout') }}" method="post"
                                class="text-gray-700 hover:bg-gray-100 px-2 py-1 rounded mb-2 block">
                                @method('delete')
                                @csrf
                                <button type="submit">Se déconnecter</button>
                            </form>
                        </nav>
                    </div>
                    <!-- Contenu Principal -->
                    <div class="flex-1 bg-gray-200 p-6 h-100">
                        @if ($tab == 'dashboard')
                            <x-dashboard></x-dashboard>
                        @elseif($tab == 'blog')
                            <x-blog></x-blog>
                        @elseif($tab == 'gallery')
                            <x-gallery></x-gallery>
                        @elseif($tab == 'user')
                            <x-user></x-user>
                        @elseif($tab == 'parameter')
                            <x-parameter></x-parameter>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
