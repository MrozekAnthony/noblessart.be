@extends('base')

@section('content')
    <div class="w-full mx-auto mt-8">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex flex-col h-full p-10">
                <p class="mb-10 text-lg">Bienvenue dans la FAQ dédiée à NoblessArt. Trouvez rapidement des réponses à vos
                    questions sur nos services de design.</p>

                <!-- Question 1 -->
                <div x-data="{ open: false }"
                    class="w-full max-w-2xl mx-auto my-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <button @click="open = !open"
                        class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-white rounded-t-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:ring-opacity-75">
                        Proposez-vous des designs personnalisés pour les sites web?
                        ...
                    </button>
                    <div x-show="open" class="mt-2 border-t border-gray-200 px-4 py-3 rounded-b-lg bg-gray-50">
                        Oui, nous offrons des services de design sur mesure pour les sites web afin de répondre
                        spécifiquement à vos besoins et à votre marque.
                    </div>
                </div>

                <!-- Question 2 -->
                <div x-data="{ open: false }"
                    class="w-full max-w-2xl mx-auto my-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <button @click="open = !open"
                        class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-white rounded-t-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:ring-opacity-75">
                        Puis-je avoir des révisions sur le design de ma carte de visite?
                        ...
                    </button>
                    <div x-show="open" class="mt-2 border-t border-gray-200 px-4 py-3 rounded-b-lg bg-gray-50">
                        Absolument! Nous offrons plusieurs cycles de révisions pour garantir votre satisfaction. Votre
                        feedback est essentiel pour un design parfait.
                    </div>
                </div>

                <!-- Question 3 -->
                <div x-data="{ open: false }"
                    class="w-full max-w-2xl mx-auto my-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <button @click="open = !open"
                        class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-white rounded-t-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:ring-opacity-75">
                        Est-il possible d'adapter le design de mon flyer pour un autocollant de voiture?
                        ...
                    </button>
                    <div x-show="open" class="mt-2 border-t border-gray-200 px-4 py-3 rounded-b-lg bg-gray-50">
                        Bien sûr! Nous pouvons adapter et redimensionner n'importe quel design pour qu'il convienne à
                        différents formats, y compris les autocollants de voiture.
                    </div>
                </div>

                <!-- Question 4 -->
                <div x-data="{ open: false }"
                    class="w-full max-w-2xl mx-auto my-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <button @click="open = !open"
                        class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-white rounded-t-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:ring-opacity-75">
                        Comment se déroule le processus de design pour un CV?
                        ...
                    </button>
                    <div x-show="open" class="mt-2 border-t border-gray-200 px-4 py-3 rounded-b-lg bg-gray-50">
                        Nous commençons par comprendre vos besoins et votre expérience professionnelle. Ensuite, nous
                        élaborons un design qui met en valeur vos compétences et votre parcours de manière professionnelle
                        et créative.
                    </div>
                </div>

                <!-- Question 5 -->
                <div x-data="{ open: false }"
                    class="w-full max-w-2xl mx-auto my-4 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <button @click="open = !open"
                        class="flex justify-between w-full px-4 py-3 text-sm font-medium text-left bg-white rounded-t-lg hover:bg-gray-100 focus:outline-none focus-visible:ring focus-visible:ring-opacity-75">
                        Quels sont vos délais de réalisation?
                        ...
                    </button>
                    <div x-show="open" class="mt-2 border-t border-gray-200 px-4 py-3 rounded-b-lg bg-gray-50">
                        Les délais varient selon le projet. En général, un design initial peut prendre entre 3-7 jours
                        ouvrables. Cependant, pour des projets plus complexes ou des demandes spécifiques, cela pourrait
                        prendre plus de temps.
                    </div>
                </div>

                <!-- (Add more questions as needed) -->

            </div>
        </section>
    </div>
@endsection
