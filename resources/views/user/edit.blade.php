<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuracion') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <!-- Mensaje -->
        @if($text=Session::get("msg"))
            <div class="block text-sm text-left text-indigo-600 bg-indigo-200 border border-indigo-400 h-12 flex items-center p-4 rounded-sm" role="alert">
                {{$text}}
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <!-- SEÑAL -->
<!-- INICIO INTENTO HACER ESTA PAGINA BONITA -->
    <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
        <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
            <div class="max-w-sm mx-auto md:w-full md:mx-0">
                <div class="inline-flex items-center space-x-4">
                    <img
                    class="w-10 h-10 object-cover rounded-full"
                    alt="User avatar"
                    src="{{asset($user->foto)}}"
                    />
                    <h1 class="text-gray-600">{{$user->name}}</h1>
                </div>
            </div>
        </div>
        <div class="bg-white space-y-6">
            <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                <h2 class="md:w-1/3 max-w-sm mx-auto">Cuenta</h2>
                <div class="md:w-2/3 max-w-sm mx-auto">
                    <label class="text-sm text-gray-400">Email</label>
                    <div class="w-full inline-flex border">
                        <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                            <svg
                            fill="none"
                            class="w-6 text-gray-400 mx-auto"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                        </div>
                        <input
                            type="email"
                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                            placeholder="{{$user->email}}"
                            disabled
                        />
                    </div>
                </div>
            </div>

            <hr />

            <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                <h2 class="md:w-1/3 mx-auto max-w-sm">Informacion personal</h2>
                <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                    <form name="form" action="{{route('user.update', $user)}}" method="POST" class="mt-3">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="text-sm text-gray-400">Nombre usuario</label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <!-- <input type="text" name="nombre" required placeholder="#" class="form-control"> -->
                                <input type="text" name="nombre" required placeholder="{{$user->name}}" class="w-11/12 focus:outline-none focus:text-gray-600 p-2">
                                <input type="hidden" name="switch" value="nombre">
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="text-white mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4">Actualizar Nombre</button>
                                    <button type="reset" class="text-white mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4">Borrar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div>
                        <form name="form" action="{{route('user.update', $user)}}" method="POST" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            @method('PUT')
                            <label class="text-sm text-gray-400">Foto de perfil</label>
                            <div class="w-full inline-flex">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <img class="w-10 h-10 object-cover" src="{{asset($user->foto)}}"/>
                                </div>
                                <input type="file" name="foto" class="form-control-file" accept="image/*" required/>
                                <input type="hidden" name="switch" value="foto">
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="text-white mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4">Actualizar foto de perfil</button>
                                    <button type="reset" class="text-white mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4">Borrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr />

            <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                <h2 class="md:w-1/3 mx-auto max-w-sm">Contraseña</h2>
                <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                    <form name="form" action="{{route('user.update', $user)}}" method="POST" class="mt-3">
                        @csrf
                        @method('PUT')
                        <div>
                            <!-- Mensaje Error en la contraseña -->
                            @if($text=Session::get("error_password"))
                                <div class="block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
                                    {{$text}}
                                </div>
                            @endif

                            <label class="text-sm text-gray-400">Contraseña actual</label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input type="password" name="password" required class="w-11/12 focus:outline-none focus:text-gray-600 p-2"/>
                            </div>
                        </div>
                        <div>
                            <label class="text-sm text-gray-400">Nueva contraseña</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input type="password" name="passwordNuevo" required class="w-11/12 focus:outline-none focus:text-gray-600 p-2" />
                            </div>
                        </div>

                        <div>
                            <label class="text-sm text-gray-400">Repetir nueva contraseña</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor" >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input type="password" name="passwordNuevoConfirmacion" required class="w-11/12 focus:outline-none focus:text-gray-600 p-2"/>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <input type="hidden" name="switch" value="password">
                                <button type="submit" class="text-white mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4">Actualizar contraseña</button>
                                <button type="reset" class="text-white mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4">Borrar</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <hr />
                <div class="w-full p-4 text-right text-gray-500">
                    <button class="inline-flex items-center focus:outline-none mr-4">
                        <svg
                            fill="none"
                            class="w-4 mr-2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                            />
                        </svg>
                        Delete account
                    </button>
                </div>
            </div>
        </div>
    </div>
                    <!-- SEÑAL -->
        </div>
    </div>

</x-app-layout>
