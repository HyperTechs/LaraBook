<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($slug)
    {
        return view('profile.index');
    }
    public function changePhoto ()
    {

        return view ('profile.picture');
    }

    public function uploadPhoto(Request $request)
    {
        //codigo para subir imagenes a una ruta y guardar en la base de datos
        //if($request->file('picture')){
            $_file = $request->file('picture');
            $_filename = 'profile_' . time() . '.' . $_file->getClientOriginalExtension();
            $_path = public_path(). '/img/';
            $_file->move($_path, $_filename);
       // }


        //dd($request->all());

        return view('profile.index');
    }
}
