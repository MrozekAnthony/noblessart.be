@extends('base')

@section('content')
    <div class="w-screen left-0 bg-[url('{{ asset('image/background-1.svg') }}')]">
        <div class="h-screen w-full flex flex-col justify-center ml-10">
            <p class="text-5xl font-semibold text-white">AU COEUR</p>
            <p class="text-5xl font-semibold text-white">DU GRAPHISME</p>
        </div>
    </div>
    <div class="w-screen left-0 bg-[url('{{ asset('image/background-2.svg') }}')]">
        <div class="h-auto min-h-screen w-3/4 mx-auto flex flex-col justify-center">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-5">
                <!-- Premier carrousel -->
                <div class="mx-5">
                    <div class="carousel relative container mx-auto">
                        <div class="carousel-inner relative overflow-hidden w-full">

                            <!--Slide 1-->
                            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true"
                                hidden="" checked="checked">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1532581140115-3e355d1ed1de?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcwMDYyNw&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-3"
                                class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-2"
                                class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!--Slide 2-->
                            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true"
                                hidden="">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1617434108848-6a1e827124ef?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcxODE3MA&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-1"
                                class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-3"
                                class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!--Slide 3-->
                            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true"
                                hidden="">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-center rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcwMDk1NA&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-2"
                                class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-1"
                                class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!-- Slide indicators -->
                            <ol class="carousel-indicators">
                                <li class="inline-block mr-3">
                                    <label for="carousel-1"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                                <li class="inline-block mr-3">
                                    <label for="carousel-2"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                                <li class="inline-block mr-3">
                                    <label for="carousel-3"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Deuxième carrousel -->
                <div class="mx-5">
                    <div class="carousel relative container mx-auto mt-10">
                        <div class="carousel-inner relative overflow-hidden w-full">
                            <!--Slide 1-->
                            <input class="carousel-open" type="radio" id="carousel-4" name="carousel2" aria-hidden="true"
                                hidden="" checked="checked">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1532581140115-3e355d1ed1de?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcwMDYyNw&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-6"
                                class="prev control-4 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-5"
                                class="next control-4 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!--Slide 2-->
                            <input class="carousel-open" type="radio" id="carousel-5" name="carousel2" aria-hidden="true"
                                hidden="">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1617434108848-6a1e827124ef?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcxODE3MA&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-4"
                                class="prev control-5 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-6"
                                class="next control-5 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!--Slide 3-->
                            <input class="carousel-open" type="radio" id="carousel-6" name="carousel2" aria-hidden="true"
                                hidden="">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-center rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcwMDk1NA&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-5"
                                class="prev control-6 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-4"
                                class="next control-6 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!-- Slide indicators -->
                            <ol class="carousel-indicators">
                                <li class="inline-block mr-3">
                                    <label for="carousel-4"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                                <li class="inline-block mr-3">
                                    <label for="carousel-5"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                                <li class="inline-block mr-3">
                                    <label for="carousel-6"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Troisième carrousel -->
                <div class="mx-5">
                    <div class="carousel relative container mx-auto">
                        <div class="carousel-inner relative overflow-hidden w-full">
                            <!--Slide 1-->
                            <input class="carousel-open" type="radio" id="carousel-7" name="carousel3"
                                aria-hidden="true" hidden="" checked="checked">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1532581140115-3e355d1ed1de?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcwMDYyNw&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-9"
                                class="prev control-7 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-8"
                                class="next control-7 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!--Slide 2-->
                            <input class="carousel-open" type="radio" id="carousel-8" name="carousel3"
                                aria-hidden="true" hidden="">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1617434108848-6a1e827124ef?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcxODE3MA&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-7"
                                class="prev control-8 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-9"
                                class="next control-8 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!--Slide 3-->
                            <input class="carousel-open" type="radio" id="carousel-9" name="carousel3"
                                aria-hidden="true" hidden="">
                            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-center rounded-t-full"
                                    style="background-image: url('https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMzcwMDk1NA&ixlib=rb-1.2.1&q=85');">
                                </div>
                            </div>
                            <label for="carousel-8"
                                class="prev control-9 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                            <label for="carousel-7"
                                class="next control-9 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-opacity-20 bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                            <!-- Slide indicators -->
                            <ol class="carousel-indicators">
                                <li class="inline-block mr-3">
                                    <label for="carousel-7"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                                <li class="inline-block mr-3">
                                    <label for="carousel-8"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                                <li class="inline-block mr-3">
                                    <label for="carousel-9"
                                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-right">voir d'autre article -></p>
        </div>
    </div>
    <div class="w-screen left-0">
        <div class="h-auto min-h-screen w-3/4 mx-auto flex flex-col justify-center">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-5">
                <div class="text-5xl col-span-1">C'est par ici que tout se crée</div>
                <div class="bg-red-500 col-span-1 md:col-span-1 lg:col-span-2">
                    <div class="carousel" style="display: flex; align-items: center;">
                        <span class="prev" onclick="prevSlide()">
                            < </span>
                                <span class="carousel-img" style="display: flex; align-items: center;">
                                    <img src="{{ $images[$slideIndex - 1] }}">
                                    <img src="{{ $slideIndex < count($images) ? $images[$slideIndex] : $images[0] }}">
                                </span>
                                <span class="next" onclick="nextSlide()">
                                    >
                                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let slideIndex = $slideIndex;
        const images = $images;

        function nextSlide() {
            slideIndex < images.length ? slideIndex++ : slideIndex = 1;
            // Update the DOM accordingly...
        }

        function prevSlide() {
            slideIndex > 1 ? slideIndex-- : slideIndex = images.length;
            // Update the DOM accordingly...
        }
    </script>
@endsection
