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

                    <!-- Boton Nuevo Tema -->
                    <a href="#" class="bg-blue-500 px-4 py-2 text-xs font-semibold tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg>
                        </span>
                        <span>
                            Nuevo Tema
                        </span>
                    </a>
                    <!-- Fin Boton Nuevo Tema -->

                    <table class="table-auto my-2 py-8">
                        <thead class="font-bold bg-gray-100 my-2 py-8">
                            <tr>
                                <th>Titulo</th>
                                <th>Creador</th>
                                <th>Fecha de creacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temas as $item)
                            <tr class="bg-emerald-200 my-2 py-8">
                                @php
                                    $num_id_user = intval($item->user_id);
                                    $id_user = $num_id_user-1;
                                @endphp
                                <td><a href="{{route('post.index',['tema_id'=>$item->id,'foro_id'=>$item->foro_id])}}">{{$item->nombre}}</a></td>
                                <td>{{$user[$id_user]->name}}</td>
                                <td>{{$item->created_at}}</td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
