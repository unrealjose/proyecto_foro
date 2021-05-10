<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //dd($req);
        $foro_id = $req->get('foro_id');
        $temas = Tema::orderBy('id')->where('foro_id','=', $foro_id)->get();
        $user = User::orderBy('id')->get();
        //dd($temas);
        return view('tema.index', compact('temas','foro_id','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //dd($req);
        $foro_id = $req->foro_id;
        return view('tema.create', compact('foro_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tema = new Tema();
        $tema->nombre = $request->nombre;
        $tema->foro_id = $request->foro_id;
        $tema->user_id = auth()->user()->id;
        $tema->save();

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->foro_id = $request->foro_id;
        $post->tema_id = DB::select("select id from temas order by id desc limit 1")[0]->id;
        $post->mensaje = $request->mensaje;
        $post->save();
        //dd($request);
        return redirect()->route('foro.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        //
    }
}
