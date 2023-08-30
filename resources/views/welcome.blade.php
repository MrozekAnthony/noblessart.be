@extends('base')

@section('content')
    <div class="w-screen left-0 bg-[url('{{ asset('image/background-1.svg') }}')] bg-center">
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
                <div class="col-span-1 md:col-span-1 lg:col-span-2 h-full border-y-2 border-[#E2D239]">
                    <div class="flex flex-col justify-center items-center">
                        <div class="max-w-4xl mx-auto relative" x-data="{
                            activeSlide: 0,
                            slides: [
                                ['logo.svg', 'logo.svg'],
                                ['no-data.svg', 'no-data.svg'],
                                ['logosb.svg', 'logosb.svg'],
                            ],
                            imagePath: '{{ asset('image/') }}/'
                        }">

                            <!-- Slides -->
                            <template x-for="(slidePair, index) in slides" :key="index">
                                <div x-show="activeSlide === index" class="flex space-x-4">
                                    <template x-for="slide in slidePair">
                                        <div class="flex-1 p-4 rounded-lg w-full h-full">
                                            <img :src="imagePath + slide" alt="Slide Image"
                                                class="w-64 h-64 rounded-lg border-[16px] border-white">
                                        </div>
                                    </template>
                                </div>
                            </template>

                            <!-- Prev/Next Arrows -->
                            <div class="absolute inset-0 flex">
                                <div class="flex items-center justify-start w-1/2">
                                    <button
                                        x-on:click="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1"
                                        class="text-3xl bg-[#222323] text-white hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6">
                                        ‹
                                    </button>
                                </div>
                                <div class="flex items-center justify-end w-1/2">
                                    <button
                                        x-on:click="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1"
                                        class="text-3xl bg-[#222323] text-white hover:text-orange-500 font-bold hover:shadow rounded-full w-12 h-12 -mr-6">
                                        ›
                                    </button>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="w-full flex items-center justify-center px-4 m-5">
                                <template x-for="(slidePair, index) in slides" :key="index">
                                    <button x-on:click="activeSlide = index"
                                        class="flex-1 w-4 h-2 mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-teal-600 hover:shadow-lg"
                                        :class="{
                                            'bg-[#E2D239]': activeSlide === index,
                                            'bg-[#1F1F1E]': activeSlide !== index
                                        }"></button>
                                </template>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <script></script>
@endsection
