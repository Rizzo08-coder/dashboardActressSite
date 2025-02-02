<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <!-- Breadcrumb e titolo -->
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li aria-current="page">
                            <div class="flex items-center">
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Calendario</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </h2>

            <!-- Bottone "Aggiungi Spettacolo" -->
            <a href="{{route('event.add')}}" class="bg-green-700 text-white py-2 px-4 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-700">
                + Aggiungi Data
            </a>
        </div>
    </x-slot>


    <div class="py-12 ">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 max-2xl:mb-12">
            <div class="ml-4 mb-2">Eventi futuri</div>
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Spettacolo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Luogo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ora
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($future_event_list as $future_event)

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$future_event->show->title}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$future_event->place}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{\Carbon\Carbon::parse($future_event->data)->format('d/m/Y')}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{\Carbon\Carbon::parse($future_event->hour)->format('H:i')}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="popup-modal-{{$future_event->id}}" data-modal-toggle="popup-modal-{{$future_event->id}}" class="inline-block max-lg:w-full text-center  text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2.5 mr-2 mb-2">
                                            Elimina
                                        </button>
                                    </td>
                                </tr>
                                <div id="popup-modal-{{$future_event->id}}" tabindex="-1" class="bg-gray-800 bg-opacity-75 fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal-{{$future_event->id}}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <h3 id="title-delete" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 overflow-x-auto break-words">
                                                    Vuoi eliminare questo evento futuro dal sistema?
                                                </h3>
                                                <a href="{{route('event.destroy',['id' => $future_event->id])}}" type="button" id="button-destroy" data-modal-hide="popup-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium  text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Elimina Evento
                                                </a>
                                                <button data-modal-hide="popup-modal-{{$future_event->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200  border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Annulla</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12">
                <div class="ml-4 mb-2">Eventi passati</div>
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Spettacolo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Luogo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ora
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($past_event_list as $past_event)

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$past_event->show->title}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$past_event->place}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{\Carbon\Carbon::parse($past_event->data)->format('d/m/Y')}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{\Carbon\Carbon::parse($past_event->hour)->format('H:i')}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="popup-modal-{{$past_event->id}}" data-modal-toggle="popup-modal-{{$past_event->id}}" class="inline-block max-lg:w-full text-center  text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2.5 mr-2 mb-2">
                                            Elimina
                                        </button>
                                    </td>
                                </tr>
                                <div id="popup-modal-{{$past_event->id}}" tabindex="-1" class="bg-gray-800 bg-opacity-75 fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal-{{$past_event->id}}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <h3 id="title-delete" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 overflow-x-auto break-words">
                                                    Vuoi eliminare questo evento passato dal sistema?
                                                </h3>
                                                <a href="{{route('event.destroy',['id' => $past_event->id])}}" type="button" id="button-destroy" data-modal-hide="popup-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium  text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Elimina Evento
                                                </a>
                                                <button data-modal-hide="popup-modal-{{$past_event->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200  border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Annulla</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>


</x-app-layout>
