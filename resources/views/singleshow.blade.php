<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li>
                        <div class="flex items-center">
                            <a href="{{route('show')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Spettacoli</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{$show->title}}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                    <div class="max-w-5xl mx-auto bg-white shadow overflow-hidden mb-32">
                        <!-- Immagine dello spettacolo -->
                        <img src="{{$show->img_url}}" alt="Spettacolo" class="w-full h-120 object-cover">


                        <div class="relative mx-12   mt-12 mb-6  text-xl  max-sm:text-lg">
                            <h2 class="text-xl font-semibold text-gray-700">Titolo</h2>
                            <p class="text-gray-600 mt-2">
                                {{$show->title}}
                            </p>
                            <h2 class="mt-6 text-xl font-semibold text-gray-700">Descrizione breve</h2>
                            <p class="text-gray-600 mt-2">
                                {{$show->short_description}}
                            </p>
                            <h2 class="mt-6 text-xl font-semibold text-gray-700">Descrizione</h2>
                            <p class="text-gray-600 mt-2">
                                {{$show->description}}
                            </p>
                            <h2 class="mt-6 text-xl font-semibold text-gray-700">Diretto da</h2>
                            <p class="text-gray-600 mt-2">
                                {{$show->directed_by}}
                            </p>
                            <h2 class="mt-6 text-xl font-semibold text-gray-700">Collaboratore</h2>
                            <p class="text-gray-600 mt-2">
                                {{$show->collaboration}}
                            </p>

                            <div class="">
                                <div class="mt-6">
                                    <a href="{{route('show.edit', ['id' => $show->id])}}" class="inline-block max-lg:w-full text-center  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 mr-2 mb-2">
                                        Modifica
                                    </a>

                                    <button data-modal-target="popup-modal-{{$show->id}}" data-modal-toggle="popup-modal-{{$show->id}}" class="inline-block max-lg:w-full text-center  text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2.5 mr-2 mb-2">
                                        Elimina
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div>


    <div id="popup-modal-{{$show->id}}" tabindex="-1" class="bg-gray-800 bg-opacity-75 fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal-{{$show->id}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 id="title-delete" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 overflow-x-auto break-words">
                        Vuoi eliminare questo spettacolo dal sistema?
                    </h3>
                    <a href="{{route('show.destroy',['id' => $show->id])}}" type="button" id="button-destroy" data-modal-hide="popup-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium  text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Elimina Spettacolo
                    </a>
                    <button data-modal-hide="popup-modal-{{$show->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200  border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Annulla</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
