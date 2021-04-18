<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tema') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Problema: Poner el nombre del creados<br>
                    Solucion1: Quitar los IDs y poner directamente el nombre, haciendo que 2 users no puedan repetir nombre
                    <table class="table-auto my-2 py-8">
                        <thead class="font-bold bg-gray-100 my-2 py-8">
                            <tr>
                                <th>Titulo</th>
                                <th>Creador</th>
                                <th>Fecha de creacion</th>
                                <th>Ultima actualizacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temas as $item)
                            <tr class="bg-emerald-200 my-2 py-8">
                                <td><a href="#">{{$item->nombre}}</a></td>
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
