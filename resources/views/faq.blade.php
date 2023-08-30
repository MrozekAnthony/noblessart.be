@extends('base')

@section('content')
    <div class="w-90 mx-auto">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex flex-col h-full p-10">
                <p class="text-3xl">FAQ</p>
                <p>Bienvenue dans la FAQ dédié à NoblessArt.</p>
                @for ($i = 0; $i < 10; $i++)
                    <div x-data="{ open: false }" class="w-full max-w-md mx-auto mt-5">
                        <!-- Header de l'expansion panel -->
                        <button @click="open = !open"
                            class="flex justify-between w-full px-4 py-2 text-sm font-medium text-left bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus-visible:ring focus-visible:ring-opacity-75">
                            Questions N° {{ $i }}
                            <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                            <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 15l7-7 7 7"></path>
                            </svg>
                        </button>

                        <!-- Contenu de l'expansion panel -->
                        <div x-show="open" class="mt-2 border-t border-gray-200 px-4 py-2">
                            Contenu de la question N° {{ $i }}
                        </div>
                    </div>
                @endfor

            </div>
        </section>
    </div>
@endsection
