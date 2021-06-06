<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray border-b border-gray-200">

                    <!-- Posts -->
                    @foreach ($posts as $item)
                        @php
                            $num_id_user = intval($item->user_id);
                            $id_user = $num_id_user-1;
                        @endphp
                        <div class="w-full m-1">
                            <!-- Distinto color para tus post y los de los demas -->
                            @if ($user[$id_user]->id == $user_id)
                            <div class="bg-gray-400 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            @else
                            <div class="bg-gray-300 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            @endif
                                <div class="flex items-center">
                                    <img class="w-10 h-10 rounded-full mr-4" src="{{asset($user[$id_user]->foto)}}">
                                    <div class="text-sm">
                                        <p class="text-black leading-none">{{$user[$id_user]->name}} <span class="text-gray-00">#{{$user[$id_user]->id}}</span></p>
                                        <p class="text-grey-dark">{{$item->created_at}}</p>
                                        <!-- La moderacion tambien es una actualizacion, por eso hay que tenerlo en cuenta-->
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
                                            <!-- Si el post es tuyo -->
                                            @if ($user[$id_user]->id == $user_id)
                                                <!-- Editar Mensaje -->
                                                <button class="modal-open bg-yellow-300 p-1 rounded" data-item-foro-id="{{ $item->foro_id }}" data-item-tema-id="{{ $item->tema_id }}" data-item-mensaje="{{ $item->mensaje }}" data-item-post="{{$item}}">Editar</button>
                                                <!-- Borrar Mensaje -->
                                                <button type="submit" onclick="return confirm('¿Deseas borrar este mensaje?')" class="bg-red-300 p-1 rounded">Borrar</button>
                                            <!-- Si el post no es tuyo pero eres Moderador/Admin -->
                                            @elseif ($user[($user_id-1)]->rango == (2||1) && $user[$id_user]->rango != 2)
                                                <!-- Moderar Mensaje -->
                                                <button type="submit" onclick="return confirm('¿Deseas moderar este mensaje?')" class="bg-red-300 p-1 rounded">Moderar</button>
                                            @endif
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <br><hr><br>
                    <!-- Enviar Post -->
                    <div class="w-full m-1">
                        <div class="bg-gray-400 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="{{asset($user[$user_id-1]->foto)}}">
                                <div class="text-sm">
                                    <p class="text-black leading-none">{{$user[($user_id-1)]->name}}</p>
                                </div>
                            </div>
                            <div class="mb-8">
                                <form name="form" method="POST" action="{{route('post.store')}}">
                                    @csrf
                                    <br>
                                    <textarea class="bg-gray-300 cursor-text" name="mensaje" required></textarea>
                                    <input type="hidden" name="foro_id" value="{{$foro_id}}">
                                    <input type="hidden" name="tema_id" value="{{$tema_id}}">
                                    <button type="submit" class="bg-green-300 p-1 rounded">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Boton volver -->
                    <a href="{{route('tema.index',['foro_id'=>$posts[0]->foro_id])}}">
                        <div class="inline-block mr-2 mt-2">
                            <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gray-500 hover:bg-gray-600 hover:shadow-lg flex items-center">
                                Volver
                            </button>
                        </div>
                    </a>
                </div>

                <!-- Ventana modal -->
                <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                    <div class="modal-container bg-gray-400 w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                            <span class="text-sm">(Esc)</span>
                        </div>

                        <div class="modal-content py-4 text-left px-6">

                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Editar mensaje</p>
                                <div class="modal-close cursor-pointer z-50">
                                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                    </svg>
                                </div>
                            </div>


                            <form name="form" action="{{route('post.update', $item)}}" method="POST" class="mt-3">
                                @csrf
                                @method('PUT')
                                <br>

                                <input type="hidden" name="foro_id" id="foro_id">
                                <input type="hidden" name="tema_id" id="tema_id">
                                <input type="hidden" name="post_info" id="post_info">

                                <textarea class="bg-gray-300 rounded" name="mensaje" id="mensaje" placeholder="" required></textarea>
                                <div class="mt-2">
                                    <button type="submit" class="bg-green-300 p-1 rounded">Actualizar Post</button>
                                    <button type="reset" class="bg-red-300 p-1 rounded">Borrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               <!-- Fin ventana modal -->

            </div>
            <div class="mt-2">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Script enfocados a la ventana modal -->

<script>

    $(document).on("click", ".modal-open", function () {
        var foroId = $(this).attr('data-item-foro-id');
        var temaId = $(this).attr('data-item-tema-id');
        var mensaje = $(this).attr('data-item-mensaje');
        var post = $(this).attr('data-item-post');
        console.log(mensaje);
        $("#foro_id").val(foroId);
        $("#tema_id").val(temaId);
        $("#mensaje").val(mensaje);
        $("#post_info").val(post);
    });

    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
            console.log(i);
    	    event.preventDefault();
    	    toggleModal();
      })
    }

    const overlay = document.querySelector('.modal-overlay');
    overlay.addEventListener('click', toggleModal);

    var closemodal = document.querySelectorAll('.modal-close');
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
    	    isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
    	    isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
    	    toggleModal()
        }
    };

    function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }
</script>
