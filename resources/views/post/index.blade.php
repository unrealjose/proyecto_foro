<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                          <th class="px-4 py-3">Creador</th>
                          <th class="px-4 py-3">Mensaje</th>
                          <th class="px-4 py-3">Fecha de creacion</th>
                          <th class="px-4 py-3">Rango user (Provisional)</th>
                          <th class="px-4 py-3">Acciones</th>
                        </tr>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            @foreach ($posts as $item)
                            <tr class="bg-emerald-200 my-2 py-8 border-2 border-solid">
                                @php
                                    $num_id_user = intval($item->user_id);
                                    $id_user = $num_id_user-1;
                                @endphp
                                <td>{{$user[$id_user]->name}}</td>
                                <td>{{$item->mensaje}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>{{$user[$id_user]->rango}}</td>

                                @if ($user[$id_user]->id == $user_id)
                                    <td>
                                        <a href="{{route('post.edit',$item)}}"><button class="bg-blue-400">Editar</button></a>
                                        <a href="#" onclick="return confirm('¿Seguro?')"><button class="bg-red-400">Borrar</button></a>
                                    </td>
                                @elseif ($user[($user_id-1)]->rango == 2)
                                    <td><a href="#" onclick="return confirm('¿Seguro?')"><button class="bg-yellow-400">Moderar</button></a></td>
                                @endif

                              </tr>
                            @endforeach
                        </tr>
                    </table>
                </div>
                <form name="form" method="POST" action="{{route('post.store')}}">
                    @csrf
                    <textarea name="mensaje"></textarea>
                    <input type="hidden" name="foro_id" value="{{$foro_id}}">
                    <input type="hidden" name="tema_id" value="{{$tema_id}}">
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
