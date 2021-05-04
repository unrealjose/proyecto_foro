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
                          <th class="px-4 py-3">Fecha</th>
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
                                @if ($item->moderado == 1)
                                    <td><i>{{$item->mensaje}}</i></td>
                                @else
                                    <td>{{$item->mensaje}}</td>
                                @endif
                                <td>{{$item->updated_at}}</td>
                                <td>{{$user[$id_user]->rango}}</td>
                                @if ($item->moderado == 1)
                                    <td></td>
                                @else
                                    <td>
                                        <form name="f" method="POST" action="{{route('post.destroy', $item)}}">
                                            @csrf
                                            @method('DELETE')
                                            @if ($user[$id_user]->id == $user_id)
                                                <a href="{{route('post.edit',$item)}}" class="bg-blue-400 rounded p-1 m-1">Editar</a>
                                                <button type="submit" class="bg-red-400">Borrar</button>
                                            @elseif ($user[($user_id-1)]->rango == 2)
                                            <button type="submit" class="bg-yellow-400 rounded p-1 m-1">Moderar</button>
                                            @endif
                                        </form>
                                    </td>
                                @endif
                              </tr>
                            @endforeach
                        </tr>
                    </table>
                    <!-- aaaa -->
                    @foreach ($posts as $item)
                        @php
                            $num_id_user = intval($item->user_id);
                            $id_user = $num_id_user-1;
                        @endphp
                        <div class="max-w-md w-full">
                            <div class="bg-gray-300 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="flex items-center">
                                    <img class="w-10 h-10 rounded-full mr-4" src="https://pbs.twimg.com/profile_images/885868801232961537/b1F6H4KC_400x400.jpg" alt="Avatar of Jonathan Reinink">
                                    <div class="text-sm">
                                        <p class="text-black leading-none">{{$user[$id_user]->name}}</p>
                                        <p class="text-grey-dark">{{$item->updated_at}}</p>
                                    </div>
                                </div>
                                <div class="mb-8">
                                    <br>
                                    @if ($item->moderado == 1)
                                        <p class="text-grey-darker text-base"><i>{{$item->mensaje}}</i></p>
                                    @else
                                        <p class="text-grey-darker text-base">{{$item->mensaje}}</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- aaaa -->
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


<!-- https://tailwindcomponents.com/component/horizontal-card -->
<!-- https://tailwindcomponents.com/component/simple-card -->
