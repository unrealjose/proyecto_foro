<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
                    return redirect()->back();
                    //return redirect()->back()->with('msg','Contraseña cambiada');
                }else{
                    return redirect()->back();
                    //return redirect()->route('foro.index')->with('msg','Contraseña cambiada')
                }
            }else{
                    return redirect()->back();
                    //return redirect()->back()->with('msg','Contraseña cambiada')
            }
        }else if($request->switch == 'nombre'){
            //dd($request);
            $user->name = $request->nombre;
            $user->update();
            return redirect()->back();
            //return redirect()->back()->with('msg','Contraseña cambiada')
        }else if($request->switch == 'foto'){
            if(isset($request['foto'])){
                $fileImagen = $request->file('foto');
                $nombre = "img/usuarios/".uniqid()."_".$fileImagen->getClientOriginalName();

                if(basename($user->foto)!="default.jpg"){
                    //dd("¿Seguro que es la imagen por defecto?",basename($user->foto),basename($request->foto));
                    unlink($user->foto);
                }

                Storage::Disk("public")->put($nombre, \File::get($fileImagen));
                $user->foto = "storage/".$nombre;
                $user->update();
                return redirect()->back();
            }
        }

        if ($request->mod == 'subir') {
            $user->rango = 1;
            $user->update();
            return redirect()->back();
        }else if ($request->mod == 'bajar'){
            $user->rango = 0;
            $user->update();
            return redirect()->back();
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

}
