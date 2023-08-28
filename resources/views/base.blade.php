<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noblessart;</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html,
        body {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif !important;
            scroll-behavior: smooth;
            background-color: #FAFAFA;
            overflow-x: hidden;
        }
        
        .carousel-open:checked + .carousel-item {
  position: static;
  opacity: 100;
}
.carousel-item {
  -webkit-transition: opacity 0.6s ease-out;
  transition: opacity 0.6s ease-out;
}
#carousel-1:checked ~ .control-1,
#carousel-2:checked ~ .control-2,
#carousel-3:checked ~ .control-3,
#carousel-4:checked ~ .control-4,
#carousel-5:checked ~ .control-5,
#carousel-6:checked ~ .control-6,
#carousel-7:checked ~ .control-7,
#carousel-8:checked ~ .control-8,
#carousel-9:checked ~ .control-9 {
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
#carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
#carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
#carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet,
#carousel-4:checked ~ .control-4 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
#carousel-5:checked ~ .control-5 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
#carousel-6:checked ~ .control-6 ~ .carousel-indicators li:nth-child(3) .carousel-bullet,
#carousel-7:checked ~ .control-7 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
#carousel-8:checked ~ .control-8 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
#carousel-9:checked ~ .control-9 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
  color: #ffb317;
}

    </style>
</head>
<body>
    
    <div class="text-black p-4">
        <!-- Header container -->
        <div class=" flex items-center justify-between">
      
          <!-- Logo à gauche -->
          <img src="{{ asset('image/logosb.svg') }}" alt="Logo" class="sm:h-32 h-16 w-auto">
      
          <!-- Titre et liens au milieu -->
          <div class="text-center">
            <h1 class="text-2xl tracking-wider">noblessart;</h1>
            <div class="mt-2 space-x-4">
              <a href="#" class="text-black hover:underline">Home</a>
              <a href="#" class="text-black hover:underline">Blog</a>
              <a href="#" class="text-black hover:underline">Galeries</a>
            </div>
          </div>
      
          <!-- Bouton hamburger à droite -->
          <button id="hamburgerBtn" class="p-2 focus:outline-none">
            ☰
          </button>
      
        </div>
      
        <!-- Menu hamburger caché au début, apparaît du côté droit de manière verticale -->
        <div id="hamburgerMenu" class="fixed top-0 right-0 h-full bg-black text-white md:w-1/3 lg:1/4 w-full transform translate-x-full transition-transform duration-300 ease-in-out">
            <!-- Bouton pour fermer le menu -->
            <button id="closeBtn" class="block top-2 right-0 p-2 focus:outline-none text-white">✕</button>

            <h2 class="text-2xl py-10">menu ;</h2>

            <a href="#" class="block hover:bg-gray-600 p-4 border-b text-center">Home</a>
            <a href="#" class="block hover:bg-gray-600 p-4 border-b text-center">Blog</a>
            <a href="#" class="block hover:bg-gray-600 p-4 border-b text-center">Galeries</a>
            <a href="#" class="block hover:bg-gray-600 p-4 border-b text-center">Qui est noblessart?</a>
            <a href="#" class="block hover:bg-gray-600 p-4 border-b text-center">Tarifs</a>
            <a href="#" class="block hover:bg-gray-600 p-4 border-b text-center">Mentions légales</a>
            <a href="#" class="block hover:bg-gray-600 p-4 border-b text-center">Conditions générales d'utilisation</a>
            <a href="#" class="block hover:bg-gray-600 p-4 border-b text-center">FAQ</a>

            <div class="flex-row justify-center items-center h-16 pt-5">
                <a href="#" class="block hover:bg-gray-600 p-4 text-center">Connexion</a>
                <a href="#" class="block p-4 text-center">ou</a>
                <a href="#" class="block hover:bg-gray-600 p-4 text-center">Inscription</a>
            </div>

        </div>

    </div>
      
      
    
    <div class="w-screen mx-auto">
        @yield('content')
    </div>

</body>
    <script>
        function toggleMenu() {
            const menu = document.getElementById('hamburgerMenu');
            if(menu.style.transform === "translateX(100%)") {
                menu.style.transform = "translateX(0)";
            } else {
                menu.style.transform = "translateX(100%)";
            }
        }

        document.getElementById('hamburgerBtn').addEventListener('click', toggleMenu);
        document.getElementById('closeBtn').addEventListener('click', toggleMenu);
    </script>
</html>