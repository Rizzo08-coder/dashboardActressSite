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
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Aggiungi spettacolo</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h2>
    </x-slot>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{url('/')}}/js/checkFormShow.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">



                <div class="py-4 xl:px-32 lg:px-12">

                                <form action="{{route('show.store')}}" method="POST" id="store_show" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-4 border border-gray-300 p-4 rounded-lg">
                                        <h1 class="mb-2"> Inserisci dati spettacolo:</h1>
                                        <div class="lg:flex">
                                            <div class="lg:w-1/2">
                                                <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white" for="title">Titolo spettacolo</label>
                                                <input type="text" id="title" name="title" class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " placeholder="Inserisci titolo spettacolo">
                                            </div>
                                            <div class="lg:w-1/2 lg:ml-4 max-lg:mt-4">
                                                    <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white " for="inputImage">Inserisci immagine spettacolo</label>
                                                    <input
                                                        type="file"
                                                        name="image"
                                                        id="inputImage"
                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                            </div>
                                        </div>


                                        <div class="lg:grid lg:grid-cols-2 mt-8">
                                            <div class="mb-4">

                                                    <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white " for="directed_by">Diretto da</label>
                                                    <input type="text" id="directed_by" name="directed_by" class="sm:text-xs block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Inserisci da chi è diretto lo spettacolo">

                                            </div>

                                            <div class="lg:ml-4 max-lg:mt-4">
                                                    <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white " for="collaboration">Collaborazione</label>
                                                    <input type="text" id="collaboration" name="collaboration" class="sm:text-xs block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Inserisci la collaborazione">

                                            </div>


                                        </div>

                                            <div class="max-lg:mt-4 mb-4">
                                                    <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white " for="short_description">Breve descrizione</label>
                                                    <textarea id="short_description" name="short_description" rows="2" class="block p-2.5 w-full sm:text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Inserisci una breve descrizione (max 2 righe)"></textarea>
                                            </div>

                                            <div class="max-lg:mt-4">

                                                    <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white " for="description">Descrizione</label>
                                                    <textarea id="description" name="description" rows="6" class="block p-2.5 w-full sm:text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Inserisci la descrizione completa"></textarea>

                                            </div>
                                    </div>




                                    <div id="alert-empty-field" class="hidden mt-6 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 " role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div class="ml-3 text-sm font-medium">
                                            Compila tutti i campi obbligatori !
                                        </div>
                                        <button type="button" class="ml-auto bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 " onclick="hideAlert_empty_field();">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                        </button>
                                    </div>


                                    <div id="alert-empty-image" class="hidden mt-6 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 " role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div class="ml-3 text-sm font-medium">
                                            Non hai inserito l'immagine dello spettacolo!
                                        </div>
                                        <button type="button" class="ml-auto bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 " onclick="hideAlert_empty_image();">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div id="alert-wrong-image" class="hidden mt-6 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 " role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div class="ml-3 text-sm font-medium">
                                            Estensione Immagine non corretta!
                                        </div>
                                        <button type="button" class="ml-auto bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 " onclick="hideAlert_wrong_image();">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                        </button>
                                    </div>


                                <div class="p-6">
                                    <div class="mt-6">
                                            <button type="submit" class=" max-lg:w-full  text-white bg-blue-700 text-center hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="event.preventDefault(); checkAddShow();">Aggiungi</button>
                                            <a href="{{route('show')}}" class="inline-block max-lg:w-full text-center  text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2.5 mr-2 mb-2"> Annulla</a>
                                    </div>
                                </div>
                                </form>


                </div>








            </div>
        </div>
    </div>
</x-app-layout>
