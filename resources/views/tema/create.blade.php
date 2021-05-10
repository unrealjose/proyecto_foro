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

                    <div class="w-full m-1">
                        <div class="rounded bg-gray-400 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <form name="form" action="{{route('tema.store')}}" method="POST" class="mt-3">
                                    @csrf
                                    <br>

                                    <input type="text" class="bg-gray-300" name="nombre" required placeholder="Nombre Tema" class="form-control">
                                    <textarea class="bg-gray-300 rounded" name="mensaje" placeholder="Descripcion del tema" required></textarea>
                                    <input type="hidden" name="foro_id" value="{{$foro_id}}">
                                    <div class="mt-2">
                                        <button type="submit" class="bg-green-300 p-1 rounded">Crear tema</button>
                                        <button type="reset" class="bg-red-300 p-1 rounded">Borrar</button>
                                        <a href="{{route('foro.index')}}" class="bg-yellow-300 p-1 rounded">Volver</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
