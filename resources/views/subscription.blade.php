@extends('base')

@section('content')
    <div class="w-90 mx-auto">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex h-full p-10">

                <!-- Première partie (2/3 de la page) -->
                <div class="bg-white p-10 rounded-lg shadow-lg">
                    <p class="py-5 text-3xl">Souscrire à un abonnement</p>
                    <div class="w-2/3 flex space-x-6 text-center justify-center space-evenly mx-auto">

                        <!-- Tarifs Particuliers -->
                        <div class="w-1/2 flex flex-col space-y-6 border border-black p-2">
                            <h2 class="text-2xl font-bold mb-4">Tarifs Particuliers</h2>

                            <!-- Grille 1 -->
                            <div class="p-2 border-b-2 border-black flex-1">
                                Amortissement de la commande
                            </div>

                            <!-- Grille 2 -->
                            <div class="p-2 border-b-2 border-black flex-1">
                                Formation
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                Choix du délai de paiement
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                Service client premium
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                Jusqu'à trois modification possible
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                Conseils offerts
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                * Étudiant ? 10% de réduction au moment de la présentation de la carte étudiant !
                            </div>
                            <div class="p-2 flex-1">
                                à partir de 9,99€
                            </div>
                        </div>

                        <!-- Tarifs Professionnels -->
                        <div class="w-1/2 flex flex-col space-y-6 border border-black p-2">
                            <h2 class="text-2xl font-bold mb-4">Tarifs Professionnels</h2>

                            <!-- Grille 1 -->
                            <div class="p-2 border-b-2 border-black flex-1">
                                Amortissement de la commande
                            </div>

                            <!-- Grille 2 -->
                            <div class="p-2 border-b-2 border-black flex-1">
                                Formation
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                Choix du délai de paiement
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                Service client premium
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                Jusqu'à trois modification possible
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                Conseils offerts
                            </div>
                            <div class="p-2 border-b-2 border-black flex-1">
                                * Étudiant ? 10% de réduction au moment de la présentation de la carte étudiant !
                            </div>
                            <div class="p-2 flex-1">
                                à partir de 49,99€
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deuxième partie (1/3 de la page) -->
                <div class="w-1/3 bg-white ml-6 rounded-lg shadow-lg flex items-center justify-center">
                    <div class="flex-row justify-center items-center h-16 w-80 mx-auto">
                        <a href="#" class="block p-4 text-center">Se connecter</a>
                        <span href="#" class="block p-0 m-0 text-center">ou</span>
                        <a href="#" class="block p-4 text-center">Créer un compte</a>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
