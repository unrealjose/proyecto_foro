<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Foro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                          <th class="px-4 py-3">Titulo</th>
                          <th class="px-4 py-3">Descripcion</th>
                        </tr>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            @foreach ($foro as $item)
                            <tr class="bg-emerald-200 my-2 py-8">
                                <td><a href="{{route('tema.index',['foro_id'=>$item->id])}}">{{$item->nombre}}</a></td>
                                <td>{{$item->descripcion}}</td>
                              </tr>
                            @endforeach
                        </tr>
                    </table>
                    <div >
                        <ul class="list-none">
                            <li>Grupo 1</li>
                            <li>
                                <ul>
                                    <li class="inline">Anuncios</li> <span>Numero</span>
                                    <li><ul><li>Descripcion</li></ul></li>
                                </ul>
                                <ul>
                                    <li>Informacion</li>
                                    <li><ul><li>Descripcion</li></ul></li>
                                </ul>
                            </li>
                            <li>Grupo 2</li>
                            <li>
                                <ul>
                                    <li>General</li>
                                    <li><ul><li>Descripcion</li></ul></li>
                                </ul>
                                <ul>
                                    <li>Off-topic</li>
                                    <li><ul><li>Descripcion</li></ul></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        ul > li {
            margin-left: 30px;
        }

        li + span {
            text-decoration: underline;
        }
    </style>

</x-app-layout>
