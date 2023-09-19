@props(['galleries'])
@extends('base')

@section('content')
    <section class="text-gray-600 body-font">
        <h1 class="text-3xl text-center p-5">Liste des Galeries</h1>

        <div class="container px-5 py-24 bg-white mx-auto">
            <div class="flex flex-wrap -m-4">
                @forelse($galleries as $gallery)
                    <div class="p-4 lg:w-1/3">


                        <!-- Carousel for each gallery -->
                        <div class="gallery-carousel">


                            <div x-data="carousel()" class="relative w-64 h-64">
                                <div class="carousel-container overflow-hidden relative w-full h-full">

                                    <!-- Slides -->
                                    <div class="carousel-slides absolute flex transition-transform duration-500 ease-in-out"
                                        :style="'transform: translateX(-' + (100 * activeIndex) + '%)'">
                                        @forelse ($gallery->images as $image)
                                            <div class="min-w-full">
                                                <img src="{{ asset($image->image) }}" alt="image in gallery"
                                                    class="w-64 h-64">
                                            </div>
                                        @empty
                                            nodata
                                        @endforelse
                                    </div>

                                    <!-- Previous Button -->
                                    <button @click="prevSlide()" x-show="activeIndex > 0"
                                        class="absolute top-1/2 left-0 z-10 bg-white bg-opacity-50 px-2 py-1 rounded-r-lg focus:outline-none">
                                        ‹
                                    </button>

                                    <!-- Next Button -->
                                    <button @click="nextSlide()" x-show="activeIndex < {{ count($gallery->images) - 1 }}"
                                        class="absolute top-1/2 right-0 z-10 bg-white bg-opacity-50 px-2 py-1 rounded-l-lg focus:outline-none">
                                        ›
                                    </button>

                                </div>
                            </div>

                        </div>


                        <h2 class="tracking-widest text-md title-font font-medium text-gray-400 mb-1">
                            {{ $gallery->title }}
                        </h2>
                    </div>

                @empty
                @endforelse
            </div>
        </div>
    </section>
    <script>
        function carousel() {
            return {
                activeIndex: 0,
                nextSlide() {
                    if (this.activeIndex <= 0) this.activeIndex++;
                },
                prevSlide() {
                    if (this.activeIndex > 0) this.activeIndex--;
                }
            }
        }
    </script>
@endsection
