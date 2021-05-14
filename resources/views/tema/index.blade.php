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
                    <a  class="modal-open" data-item-foro-id={{$foro_id}}>
                        <div class="inline-block mr-2 mt-2">
                            <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gray-500 hover:bg-gray-600 hover:shadow-lg flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Nuevo Tema
                            </button>
                        </div>
                    </a >

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
                                        //Ultimo usuario en postear
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
                                        // Numero de post en este tema
                                        echo count(Illuminate\Support\Facades\DB::select('select * from posts where tema_id = ?', [$item->id]));
                                    @endphp
                                </td>
                              </tr>
                            @endforeach
                        </tr>
                    </table>

                    <!--
                    Cosas Modales
                    Modal -->
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
                                    <p class="text-2xl font-bold">Nuevo tema</p>
                                    <div class="modal-close cursor-pointer z-50">
                                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                        </svg>
                                    </div>
                                </div>


                                <form name="form" action="{{route('tema.store')}}" method="POST" class="mt-3">
                                    @csrf
                                    <br>

                                    <input type="hidden" name="foro_id" id="foro_id">

                                    <input type="text" class="bg-gray-300 rounded mb-2" name="nombre" required placeholder="Nombre Tema" class="form-control">
                                    <textarea class="bg-gray-300 rounded" name="mensaje" placeholder="Descripcion del tema" required></textarea>

                                    <div class="mt-2">
                                        <button type="submit" class="bg-green-300 p-1 rounded">Crear tema nuevo</button>
                                        <button type="reset" class="bg-red-300 p-1 rounded">Borrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Cosas Modales -->

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

    <script>

        $(document).on("click", ".modal-open", function () {
            var foroId = $(this).attr('data-item-foro-id');
            $("#foro_id").val(foroId);
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

</x-app-layout>
