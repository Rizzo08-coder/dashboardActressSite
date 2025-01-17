<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <!-- Breadcrumb e titolo -->
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li aria-current="page">
                            <div class="flex items-center">
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Spettacoli</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </h2>

            <!-- Bottone "Aggiungi Spettacolo" -->
            <a href="{{route('show.add')}}" class="bg-green-700 text-white py-2 px-4 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-700">
                + Aggiungi Spettacolo
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Titolo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descrizione breve
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($show_list as $show)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$show->title}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$show->short_description}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('singleshow.show',['name' => $show->title])}}" class="border border-blue-600 text-blue-500 px-6 py-2 hover:bg-blue-600 hover:text-white transition">
                                        Dettagli
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>
