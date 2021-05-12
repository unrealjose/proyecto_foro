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
                    <a href="{{route('tema.create',['foro_id'=>$foro_id])}}">
                        <div class="inline-block mr-2 mt-2">
                            <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gray-500 hover:bg-gray-600 hover:shadow-lg flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Nuevo Tema
                            </button>
                        </div>
                    </a>
                    <!-- Fin Boton Nuevo Tema -->

                    @php
                        //select count(*) from posts where temas_id = tema_actual
                        $num
                    @endphp

                    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                          <th class="px-4 py-3">Titulo</th>
                          <th class="px-4 py-3">Creador</th>
                          <th class="px-4 py-3">Fecha de creacion</th>
                          <th class="px-4 py-3">Ultimo Post</th>
                          <th class="px-4 py-3">Numero Posts</th>

                        </tr>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            @foreach ($temas as $item)
                            <tr class="bg-emerald-200 my-2 py-8">
                                @php
                                    $num_id_user = intval($item->user_id);
                                    $id_user = $num_id_user-1;
                                @endphp
                                <td><a href="{{route('post.index',['tema_id'=>$item->id,'foro_id'=>$item->foro_id])}}">{{$item->nombre}}</a></td>
                                <td>{{$user[$id_user]->name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    @php
                                        //var_dump(Illuminate\Support\Facades\DB::select('SELECT user_id FROM posts WHERE tema_id = ? ORDER BY id DESC LIMIT 1', [$item->id])[0]->user_id);
                                        $id_ultimo = Illuminate\Support\Facades\DB::select('SELECT user_id FROM posts WHERE tema_id = ? ORDER BY id DESC LIMIT 1', [$item->id])[0]->user_id;
                                        if($id_ultimo == 0){
                                            echo "-";
                                        }else{
                                            echo Illuminate\Support\Facades\DB::select('select name from users where id = ?', [$id_ultimo])[0]->name;
                                        }

                                    @endphp
                                </td>
                                <td>
                                    @php
                                        echo count(Illuminate\Support\Facades\DB::select('select * from posts where tema_id = ?', [$item->id]));
                                    @endphp
                                </td>
                              </tr>
                            @endforeach
                        </tr>
                    </table>
                    <!-- Boton volver -->
                    <a href="{{route('foro.index',['foro_id'=>$temas[0]->foro_id])}}">
                        <div class="inline-block mr-2 mt-2">
                            <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gray-500 hover:bg-gray-600 hover:shadow-lg flex items-center">
                                Volver
                            </button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
