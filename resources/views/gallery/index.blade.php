@extends('base')

@section('content')
    <div class="w-90 mx-auto">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto ">
                <section class="text-gray-600 body-font">
                    <div class="container px-5  mx-auto">
                        <div class="flex flex-wrap -m-4">
                            @for ($i = 0; $i < 10; $i++)
                                <div class="lg:w-1/4 md:w-1/2 p-4 w-full cursor-pointer">
                                    <a class="block relative h-48 rounded overflow-hidden border-[16px] border-white">
                                        <img alt="gallerie photo" class="object-cover object-center w-full h-full block"
                                            src="https://dummyimage.com/420x260">
                                    </a>
                                    <div class="mt-4">
                                        <h2 class="text-gray-900 text-center title-font text-lg font-medium">Titre
                                            {{ $i }}
                                        </h2>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
