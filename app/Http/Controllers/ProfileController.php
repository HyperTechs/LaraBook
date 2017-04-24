<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function index($slug)
    {
        return view('profile.index')->with('data', auth()->user()->profiles);
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

        $_user_id = Auth::user()->id;

        DB::table('users')->where('id', $_user_id)->update(['picture' => $_filename ]);

        //return view('profile.index');

       return redirect()->back();
    }

    public function EditProfile()
    {

        return view('profile.editProfile')->with('data', auth()->user()->profiles);
    }

    public function UpdateProfile(Profile $profile, Request $request)
    {
        
        $user_id = auth()->user()->id;

        DB::table('profiles')->where('user_id', $user_id)->update($request->except('_token'));
        
       // dd($request->all());

        return redirect()->back();
    }    
}
