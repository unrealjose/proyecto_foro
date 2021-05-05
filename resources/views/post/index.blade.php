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

                    <!-- Posts Buenos Buenos Buenos -->
                    @foreach ($posts as $item)
                        @php
                            $num_id_user = intval($item->user_id);
                            $id_user = $num_id_user-1;
                        @endphp
                        <div class="w-full m-1">
                            @if ($user[$id_user]->id == $user_id)
                            <div class="bg-gray-400 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            @else
                            <div class="bg-gray-300 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            @endif
                                <div class="flex items-center">
                                    <img class="w-10 h-10 rounded-full mr-4" src="{{asset($user[$id_user]->foto)}}">
                                    <div class="text-sm">
                                        <p class="text-black leading-none">{{$user[$id_user]->name}}</p>
                                        <p class="text-grey-dark">{{$item->created_at}}</p>
                                        @if ($item->created_at != $item->updated_at && $item->moderado == 0)
                                            <p class="text-grey-dark">(Editado el {{$item->updated_at}})</p>
                                        @endif
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
                                @if ($item->moderado != 1)
                                    <div class="flex items-center">
                                        <form name="f" method="POST" action="{{route('post.destroy', $item)}}">
                                            @csrf
                                            @method('DELETE')
                                            @if ($user[$id_user]->id == $user_id)
                                                <a href="{{route('post.edit',$item)}}"><i class="fas fa-edit"></i></a>
                                                <button type="submit"><i class="far fa-trash-alt"></i></button>
                                            @elseif ($user[($user_id-1)]->rango == (2||1) && $user[$id_user]->rango != 2)
                                                <button type="submit"><i class="fas fa-ban"></i></button>
                                            @endif
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <!-- Posts Buenos Buenos Buenos -->
                    <br><hr><br>
                    <!-- Enviar Post -->
                    <div class="w-full m-1">
                        <div class="bg-gray-400 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="https://pbs.twimg.com/profile_images/885868801232961537/b1F6H4KC_400x400.jpg" alt="Avatar of Jonathan Reinink">
                                <div class="text-sm">
                                    <p class="text-black leading-none">{{$user[($user_id-1)]->name}}</p>
                                    <p>Quitar // {{$user[($user_id-1)]->rango}}</p>
                                </div>
                            </div>
                            <div class="mb-8">
                                <form name="form" method="POST" action="{{route('post.store')}}">
                                    @csrf
                                    <br>
                                    <textarea class="bg-gray-300" name="mensaje" required></textarea>
                                    <input type="hidden" name="foro_id" value="{{$foro_id}}">
                                    <input type="hidden" name="tema_id" value="{{$tema_id}}">
                                    <button type="submit"><i class="far fa-envelope"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-2">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>


<!-- https://tailwindcomponents.com/component/horizontal-card -->
<!-- https://tailwindcomponents.com/component/simple-card -->
