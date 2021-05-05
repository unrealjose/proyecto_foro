<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Foro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                          <th class="px-4 py-3">Titulo</th>
                          <th class="px-4 py-3">Descripcion</th>
                        </tr>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            @foreach ($foro as $item)
                            <tr class="bg-emerald-200 my-2 py-8">
                                <td><a href="{{route('tema.index',['foro_id'=>$item->id])}}">{{$item->nombre}}</a></td>
                                <td>{{$item->descripcion}}</td>
                              </tr>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="flex flex-col md:grid grid-cols-9 mx-auto p-2 text-blue-50">

            <!-- left -->
          <div class="flex flex-row-reverse md:contents">
            <div class="bg-blue-500 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
              <h3 class="font-semibold text-lg mb-1">{{$foro[0]->nombre}}</h3>
              <p class="leading-tight text-justify">
                {{$foro[0]->descripcion}}
              </p>
            </div>
            <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
              <div class="h-full w-6 flex items-center justify-center">
                <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
              </div>
              <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
            </div>
          </div>

          <!-- left -->
          <div class="flex flex-row-reverse md:contents">
            <div class="bg-blue-500 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
              <h3 class="font-semibold text-lg mb-1">{{$foro[0]->nombre}}</h3>
              <p class="leading-tight text-justify">
                {{$foro[0]->descripcion}}
              </p>
            </div>
            <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
              <div class="h-full w-6 flex items-center justify-center">
                <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
              </div>
              <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
            </div>
          </div>

          <!-- right -->
          <div class="flex md:contents">
            <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
              <div class="h-full w-6 flex items-center justify-center">
                <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
              </div>
              <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
            </div>
            <div class="bg-blue-500 col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-md">
              <h3 class="font-semibold text-lg mb-1">{{$foro[1]->nombre}}</h3>
              <p class="leading-tight text-justify">
                {{$foro[1]->descripcion}}
              </p>
            </div>
          </div>

          <!-- left -->
          <div class="flex flex-row-reverse md:contents">
            <div class="bg-blue-500 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
              <h3 class="font-semibold text-lg mb-1">{{$foro[2]->nombre}}</h3>
              <p class="leading-tight text-justify">
                {{$foro[2]->descripcion}}
              </p>
            </div>
            <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
              <div class="h-full w-6 flex items-center justify-center">
                <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
              </div>
              <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
            </div>
          </div>

          <!-- left -->
          <div class="flex flex-row-reverse md:contents">
            <div class="bg-blue-500 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
              <h3 class="font-semibold text-lg mb-1">{{$foro[3]->nombre}}</h3>
              <p class="leading-tight text-justify">
                {{$foro[3]->descripcion}}
              </p>
            </div>
            <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
              <div class="h-full w-6 flex items-center justify-center">
                <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
              </div>
              <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
            </div>
          </div>

          <!-- right -->
          <div class="flex md:contents">
            <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
              <div class="h-full w-6 flex items-center justify-center">
                <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
              </div>
              <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
            </div>
            <div class="bg-blue-500 col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-md">
              <h3 class="font-semibold text-lg mb-1">Lorem ipsum</h3>
              <p class="leading-tight text-justify">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Vitae, facilis.
              </p>
            </div>
          </div>
        </div>
      </div>

</x-app-layout>
