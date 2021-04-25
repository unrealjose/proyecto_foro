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
                    <table class="table-auto my-2 py-8">
                        <thead class="font-bold bg-gray-100 my-2 py-8">
                            <tr>
                                <th>Creador</th>
                                <th>Mensaje</th>
                                <th>Fecha de creacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)
                            <tr class="bg-emerald-200 my-2 py-8">
                                @php
                                    $num_id_user = intval($item->user_id);
                                    $id_user = $num_id_user-1;
                                @endphp
                                <td>{{$user[$id_user]->name}}</td>
                                <td>{{$item->mensaje}}</td>
                                <td>{{$item->created_at}}</td>
                              </tr>
                            @endforeach
                        </tbody>
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
