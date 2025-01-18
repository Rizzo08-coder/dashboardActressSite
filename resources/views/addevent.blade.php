<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li>
                        <div class="flex items-center">
                            <a href="{{route('event')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Eventi</a>
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Aggiungi Evento</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h2>
    </x-slot>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{url('/')}}/js/checkFormEvent.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">



                <div class="py-4 xl:px-32 lg:px-12">
                                <form action="{{route('event.store')}}" method="POST" id="store_event" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-4 p-4 rounded-lg">
                                        <h1 class="mb-2"> Inserisci dati evento:</h1>
                                        <div class="mb-4">
                                            <div class="">
                                                <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white" for="show">Spettacolo</label>

                                                <select id="show" name="show" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @foreach($show_list as $show)
                                                        <option id="show-{{$show->id}}" value="{{$show->id}}">{{$show->title}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white" for="place">Luogo evento</label>
                                                    <input type="text" id="place" name="place" class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 " placeholder="Inserisci luogo dell'evento">
                                            </div>
                                        </div>


                                        <div class="lg:grid lg:grid-cols-2 mt-4">
                                            <div class="mb-4">
                                                <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white " >Data evento</label>

                                                <div class="relative ">
                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                        </svg>
                                                    </div>
                                                    <input id="datepicker-actions" datepicker-format="dd/mm/yyyy" name="date" datepicker datepicker-buttons datepicker-autoselect-today type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Seleziona data" readonly>
                                                </div>





                                            </div>

                                            <div class="lg:ml-4 max-lg:mt-4">

                                                <label class="block mb-2 text-xs font-cabritobold font-medium text-gray-900 dark:text-white " >Ora evento</label>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </div>
                                                    <input type="time" id="hour" name="hour" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="00:00" required />
                                                </div>


                                            </div>


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



                                    <div class="p-6">
                                        <div class="mt-6">
                                                <button type="submit" class=" max-lg:w-full  text-white bg-blue-700 text-center hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="event.preventDefault(); checkAddEvent();">Aggiungi</button>
                                                <a href="{{route('event')}}" class="inline-block max-lg:w-full text-center  text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2.5 mr-2 mb-2"> Annulla</a>
                                        </div>
                                    </div>
                                </form>


                </div>








            </div>
        </div>
    </div>
</x-app-layout>

