<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $tema_id = $req->get('tema_id');
        $foro_id = $req->get('foro_id');
        $user = User::orderBy('id')->get();
        $user_id = auth()->user()->id;
        //dd($user_id);
        //$posts = Post::orderBy('id')->where('tema_id','=', $tema_id)->get();
        $posts = Post::orderBy('id')->where('tema_id','=', $tema_id)->paginate(10)->withQueryString();
        return view('post.index', compact('posts','tema_id','foro_id','user','user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
       //dd($req);
       $post = new Post();
       $post->user_id = auth()->user()->id;
       $post->foro_id = $req->foro_id;
       $post->tema_id = $req->tema_id;
       $post->mensaje = $req->mensaje;
       $post->save();
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //dd($post);
        //$foro_id = $req->foro_id;
        $user = auth()->user();
        return view('post.edit', compact('post','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //dd($request);
        //$post = new Post();
        //$post->user_id = auth()->user()->id;
        //$post->foro_id = $req->foro_id;
        //$post->tema_id = $req->tema_id;
        $post->mensaje = $request->mensaje;
        $post->update();
        return redirect()->route('foro.index');
        //return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //dd($post);
        if ($post->user_id == auth()->user()->id) {
            $post->mensaje = "Mensaje eliminado por el autor";
        }else{
            $post->mensaje = "Este mensaje ha sido moderado";
        }

        $post->moderado = 1;
        $post->update();
        return redirect()->route('foro.index');
    }
}
