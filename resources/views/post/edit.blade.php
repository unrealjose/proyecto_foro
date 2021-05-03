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

                    <form name="form" action="{{route('post.update', $post)}}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-2">
                                <input type="text" name="mensaje" required placeholder="Mensaje" class="form-control">
                                <!--<input type="hidden" name="foro_id" value="{{$post->foro_id}}">
                                <input type="hidden" name="tema_id" value="{{$post->tema_id}}">
                                <input type="hidden" name="post_id" value="{{$post->post_id}}">-->
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-success">Actualizar Post</button>
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
