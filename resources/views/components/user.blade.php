<div class="w-90 mx-auto h-[calc(100vh-240px)] overflow-y-auto">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Liste des utilisateurs</h1>
            </div>
            <div class="flex flex-wrap -m-2">
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="https://dummyimage.com/80x80">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Enola Santin</h2>
                            <p class="text-gray-500">Super_Administateur</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="https://dummyimage.com/80x80">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Anthony Mrozek</h2>
                            <p class="text-gray-500">Dev</p>
                        </div>
                    </div>
                </div>
                @for ($i = 0; $i < 10; $i++)
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                src="https://dummyimage.com/80x80">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium">Utilisateur {{ $i }}</h2>
                                <p class="text-gray-500">{{ $i < 5 ? 'Administrateur' : 'Utilisateur simple' }}</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
</div>
