<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $req)
    {
        $usuarios = User::orderBy('id')->get();

        if($req->switch == 'conf'){
            return view('user.edit', compact('user'));
        }else if($req->switch == 'mod'){
            return view('user.moderar', compact('usuarios'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if($request->switch == 'password'){
            if(Hash::check($request->password, auth()->user()->password)){
                if($request->passwordNuevo == $request->passwordNuevoConfirmacion){
                    $user->password = Hash::make($request->passwordNuevo);
                    $user->update();
                    return redirect()->route('foro.index');
                //return redirect()->route('foro.index')->with('msg','Contraseña cambiada')
                }else{
                    return redirect()->route('foro.index');
                    //return redirect()->route('foro.index')->with('msg','Contraseña incorrecta')
                }
            }else{
                return redirect()->route('foro.index');
                //return redirect()->route('foro.index')->with('msg','Contraseña incorrecta')
            }
        }else if($request->switch == 'nombre'){
            $user->name = $request->nombre;
            $user->update();
            return redirect()->route('foro.index');
            //return redirect()->route('foro.index')->with('msg','Nombre cambiado')
        }

        if ($request->mod == 'subir') {
            $user->rango = 1;
            $user->update();
            return redirect()->route('foro.index');
        }else if ($request->mod == 'bajar'){
            $user->rango = 0;
            $user->update();
            return redirect()->route('foro.index');
        }

        //return redirect()->route('foro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //----------------------

    public function cambiarContraseña(Request $request){
        dd($request);
        dd(auth()->user());
    }
}
