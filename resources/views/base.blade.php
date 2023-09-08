<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noblessart;</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <style>
        html,
        body {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif !important;
            scroll-behavior: smooth;
            background-color: #FAFAFA;
            overflow-x: hidden;
        }



        @media (min-width: 1024px) {
            .carousel-slide {
                width: 50% !important;
                /* Pour que deux diapositives tiennent côte à côte */
            }
        }


        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3,
        #carousel-4:checked~.control-4,
        #carousel-5:checked~.control-5,
        #carousel-6:checked~.control-6,
        #carousel-7:checked~.control-7,
        #carousel-8:checked~.control-8,
        #carousel-9:checked~.control-9 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet,
        #carousel-4:checked~.control-4~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-5:checked~.control-5~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-6:checked~.control-6~.carousel-indicators li:nth-child(3) .carousel-bullet,
        #carousel-7:checked~.control-7~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-8:checked~.control-8~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-9:checked~.control-9~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #ffb317;
        }
    </style>
</head>

<body>

    <div class="text-black p-4">
        <!-- Header container -->
        <div class=" flex items-center justify-between">

            <!-- Logo à gauche -->
            <a href="/">
                <img src="{{ asset('image/logosb.svg') }}" alt="Logo" class="sm:h-32 h-16 w-auto">
            </a>

            <!-- Titre et liens au milieu -->
            <div class="text-center">
                <h1 class="text-2xl tracking-wider">noblessart;</h1>
                <div class="mt-2 space-x-4">
                    <a href="/" class="text-black hover:underline">Home</a>
                    <a href="/blog" class="text-black hover:underline">Blog</a>
                    <a href="/galerie" class="text-black hover:underline">Galeries</a>
                </div>
            </div>

            @auth
                <!-- Bouton hamburger à droite -->
                <button id="hamburgerBtn" class="p-2 focus:outline-none border-2 border-[#E2D239]"
                    title="Cliquez pour ouvrir le menu">
                    ☰
                </button>
            @endauth

            @guest
                <!-- Bouton hamburger à droite -->
                <button id="hamburgerBtn" class="p-2 focus:outline-none" title="Cliquez pour ouvrir le menu">
                    ☰
                </button>
            @endguest

        </div>

        <!-- Menu hamburger caché au début, apparaît du côté droit de manière verticale -->
        <div id="hamburgerMenu"
            class="fixed top-0 right-0 h-full bg-black text-white md:w-1/3 lg:1/4 w-full transform translate-x-full transition-transform duration-300 ease-in-out z-50">

            <div class="flex flex-row justify-between p-10">
                <h2 class="text-2xl py-10 ">menu ;</h2>
                <!-- Bouton pour fermer le menu -->
                <button id="closeBtn" class="block top-2 right-0 p-2 focus:outline-none text-white">✕</button>
            </div>

            <a href="/" class="block hover:bg-gray-600 p-4 border-b text-center w-80 mx-auto">Home</a>
            <a href="/blog" class="block hover:bg-gray-600 p-4 border-b text-center w-80 mx-auto">Blog</a>
            <a href="/galerie" class="block hover:bg-gray-600 p-4 border-b text-center w-80 mx-auto">Galeries</a>
            <a href="/abonnement" class="block hover:bg-gray-600 p-4 border-b text-center w-80 mx-auto">Tarifs</a>
            <a href="/mentions-legales" class="block hover:bg-gray-600 p-4 border-b text-center w-80 mx-auto">Mentions
                légales</a>
            <a href="/conditions-generales-de-vente"
                class="block hover:bg-gray-600 p-4 border-b text-center w-80 mx-auto">Conditions générales
                d'utilisation</a>
            <a href="/faq" class="block hover:bg-gray-600 p-4 border-b text-center w-80 mx-auto">FAQ</a>

            <div class="flex-row justify-center items-center h-16 pt-10 w-80 mx-auto">
                @auth
                    <a class="block hover:bg-gray-600 p-4 text-center" href="/dashboard">
                        😀 Profil de {{ \illuminate\Support\Facades\Auth::user()->name }}
                    </a>
                    <form action="{{ route('auth.logout') }}" method="post"
                        class="block hover:bg-gray-600 p-4 text-center">
                        @method('delete')
                        @csrf
                        <button type="submit">Se déconnecter</button>
                    </form>
                @endauth

                @guest
                    <a href="/connexion" class="block hover:bg-gray-600 p-4 text-center">Se connecter</a>
                    <span href="#" class="block p-0 m-0 text-center">ou</span>
                    <a href="/creer-un-compte" class="block hover:bg-gray-600 p-4 text-center">Créer un compte</a>
                @endguest
            </div>

        </div>

    </div>



    <div class="w-screen mx-auto">
        @yield('content')
    </div>
</body>

<footer class="bg-[#1f1f1e] bg-[url('{{ asset('image/flowers.svg') }}')] text-white text-center text-md">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4">
            <div class="p-4 lg:w-1/3">
                <p>Qui est NoblessArt ?</p>
                <p>Contact :</p>
                <p>TVA : BE 0000 000 000</p>
            </div>
            <div class="p-4 lg:w-1/3">
                <p>Mentions légales</p>
                <p>Conditions générales d'utilisation</p>
                <p>FAQ</p>
            </div>
            <div class="p-4 lg:w-1/3">
                <p>All rights reserved © 2023</p>
                <p>Designed by noblessart</p>
                <p>Website Development by Digam</p>
            </div>
        </div>
    </div>

</footer>

<script>
    function toggleMenu() {
        const menu = document.getElementById('hamburgerMenu');
        if (menu.style.transform === "translateX(100%)") {
            menu.style.transform = "translateX(0)";
        } else {
            menu.style.transform = "translateX(100%)";
        }
    }

    document.getElementById('hamburgerBtn').addEventListener('click', toggleMenu);
    document.getElementById('closeBtn').addEventListener('click', toggleMenu);
</script>

</html>
