<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moderacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Rango</th>
                            <th class="px-4 py-3">Accion</th>
                        </tr>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            @foreach ($usuarios as $item)
                                <tr class="bg-emerald-200 my-2 py-8">
                                    <td>{{$item->name}}</td>

                                    @if ($item->rango == 0)
                                        <td>Usuario Normal</td>
                                    @elseif ($item->rango == 1)
                                        <td>Moderador</td>
                                    @else
                                        <td>Administrador</td>
                                    @endif

                                    <form name="form" action="{{route('user.update', $item)}}" method="POST" enctype="multipart/form-data" class="mt-3">
                                        @csrf
                                        @method('PUT')

                                        @if ($item->rango == 0)
                                            <input type="hidden" name="mod" value="subir">
                                            <td><button type="submit">Subir</button></td>
                                        @elseif ($item->rango == 1)
                                            <input type="hidden" name="mod" value="bajar">
                                            <td><button type="submit">Bajar</button></td>
                                        @else
                                            <td>-</td>
                                        @endif
                                    </form>
                                </tr>
                            @endforeach
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
