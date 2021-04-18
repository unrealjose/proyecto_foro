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
                    <table class="table-auto my-2 py-8">
                        <thead class="font-bold bg-gray-100 my-2 py-8">
                          <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($foro as $item)
                            <tr class="bg-emerald-200 my-2 py-8">
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->descripcion}}</td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
