@extends('base')

@section('content')
    <section class="text-gray-600 body-font bg-gray-100 py-12">
        <div class="container mx-auto px-5">
            <p class="text-3xl font-semibold mb-10 text-center">Souscrire à un abonnement</p>
            <div class="flex flex-wrap -m-4">
                <!-- Tarifs Particuliers -->
                <div class="p-4 lg:w-1/2 sm:w-1/2 w-full">
                    <div class="h-full border-2 border-gray-300 p-6 rounded-lg shadow-md bg-white">
                        <h2 class="text-xl font-medium title-font mb-5 text-indigo-700 text-center">Tarifs Particuliers</h2>
                        <ul class="mb-5 space-y-3">
                            <!-- Liste des avantages -->
                            @foreach (['Amortissement de la commande', 'Choix du délai de paiement', 'Service client premium', 'Jusqu\'à trois modification possible', 'Conseils offerts'] as $benefit)
                                <li class="flex items-center">
                                    <span
                                        class="bg-indigo-100 text-indigo-500 w-5 h-5 mr-3 rounded-full inline-flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M20 6L9 17l-5-5"></path>
                                        </svg>
                                    </span>
                                    {{ $benefit }}
                                </li>
                            @endforeach
                        </ul>
                        <p class="text-lg font-semibold mb-2">à partir de 9,99€</p>
                        <p class="text-sm text-gray-500">* Étudiant ? 10% de réduction au moment de la présentation de la
                            carte étudiant !</p>
                        <div class="mt-6 text-center">
                            <a href="#"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-full">Souscrire</a>
                        </div>
                    </div>
                </div>

                <!-- Tarifs Professionnels -->
                <div class="p-4 lg:w-1/2 sm:w-1/2 w-full">
                    <div class="h-full border-2 border-gray-300 p-6 rounded-lg shadow-md bg-white">
                        <h2 class="text-xl font-medium title-font mb-5 text-indigo-700 text-center">Tarifs Professionnels
                        </h2>
                        <ul class="mb-5 space-y-3">
                            <!-- Liste des avantages -->
                            @foreach (['Amortissement de la commande', 'Choix du délai de paiement', 'Service client premium', 'Jusqu\'à trois modification possible', 'Conseils offerts'] as $benefit)
                                <li class="flex items-center">
                                    <span
                                        class="bg-indigo-100 text-indigo-500 w-5 h-5 mr-3 rounded-full inline-flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M20 6L9 17l-5-5"></path>
                                        </svg>
                                    </span>
                                    {{ $benefit }}
                                </li>
                            @endforeach
                        </ul>
                        <p class="text-lg font-semibold mb-2">à partir de 49,99€</p>
                        <p class="text-sm text-gray-500">* En reconversion professionnel ? 10% de réduction au moment de la
                            présentation
                            d'un justificatif !</p>
                        <div class="mt-6 text-center">
                            <a href="#"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-full">Souscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
