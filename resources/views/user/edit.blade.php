<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuracion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form name="form" action="{{route('user.update', $user)}}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <input type="file" name="logo" class="form-control-file" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <input type="text" name="nombre" required placeholder="{{$user->name}}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <input type="text" name="pasword" required placeholder="Contraseña" class="form-control">
                                <input type="text" name="paswordNuevo" required placeholder="Nueva contraseña" class="form-control">
                                <input type="text" name="passwordNuevoConfirmacion" required placeholder="Repetir contraseña" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Borrar</button>
                                <a href="{{route('foro.index')}}" class="btn btn-primary">Volver</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>