<div x-data="carousel()" class="relative container mx-auto bg-gray-500" style="max-width:1600px;">
    <div class="relative overflow-hidden w-full">
        <template x-for="(image, index) in images" :key="index">
            <div x-show="activeIndex === index" class="carousel-item absolute w-full h-80" style="display: none;">
                <div class="block h-full w-full bg-cover bg-right w-32 h-32"
                    :style="'background-image: url(' + image + ');'">
                </div>
            </div>
        </template>

        <button @click="prevSlide"
            class="absolute top-1/2 left-0 w-10 h-10 text-3xl font-bold text-black hover:text-white bg-white bg-opacity-20 rounded-full leading-tight text-center z-10 transform -translate-y-1/2">‹</button>
        <button @click="nextSlide"
            class="absolute top-1/2 right-0 w-10 h-10 text-3xl font-bold text-black hover:text-white bg-white bg-opacity-20 rounded-full leading-tight text-center z-10 transform -translate-y-1/2">›</button>

        <!-- slide indicators -->
        <ol class="carousel-indicators absolute bottom-0 left-1/2 transform -translate-x-1/2">
            <template x-for="(image, index) in images" :key="index">
                <li class="inline-block mr-3">
                    <button @click="setSlide(index)"
                        x-bind:class="{ 'text-gray-900': activeIndex === index, 'text-gray-400': activeIndex !== index }"
                        class="carousel-bullet cursor-pointer block text-4xl">•</button>
                </li>
            </template>
        </ol>
    </div>
</div>

<script>
    function carousel() {
        return {
            activeIndex: 0,
            images: [
                '{{ asset('image/logo.svg') }}',
                '{{ asset('image/logo.svg') }}',
                '{{ asset('image/logo.svg') }}'
            ],
            setSlide(index) {
                this.activeIndex = index;
            },
            prevSlide() {
                this.activeIndex = (this.activeIndex > 0) ? this.activeIndex - 1 : this.images.length - 1;
            },
            nextSlide() {
                this.activeIndex = (this.activeIndex < this.images.length - 1) ? this.activeIndex + 1 : 0;
            }
        }
    }
</script>
