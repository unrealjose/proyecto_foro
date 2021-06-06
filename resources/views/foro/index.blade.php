<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Foro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-200 border-b border-gray-200">

                    <!-- Prueba -->

                    <div class="container">
                        <table class=" w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                            <thead class="text-black">

                                @foreach ($foro as $item)
                                <tr class="bg-gray-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                    <th class="p-3 text-left">Titulo</th>
                                    <th class="p-3 text-left">Descripcion</th>

                                </tr>
                                @endforeach
                            </thead>
                            <tbody class=" flex-1 sm:flex-none">

                                @foreach ($foro as $item)
                                <tr class="bg-gray-300 flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                    <td class=" hover:bg-gray-100 p-3"><a href="{{route('tema.index',['foro_id'=>$item->id])}}">{{$item->nombre}}</a></td>
                                    <td class=" hover:bg-gray-100 p-3 truncate">{{$item->descripcion}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <!-- Prueba -->

                </div>
            </div>
        </div>
    </div>

    <style>
        html,
  body {
    height: 100%;
  }

  @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }


    </style>

</x-app-layout>
