<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profile;
use App\Friendship;

class FriendController extends Controller
{
    public function index()
    {
    	$uid = auth()->user()->id;

        $_allUser = DB::table('profiles')->leftJoin('users', 'users.id', '=', 'profiles.user_id')->where('users.id', '!=', $uid)->get();

        return view('friend.findfriends', compact('_allUser'));
    }

    public function addfriend($id)
    {
        Auth::user()->addfriends($id);
        return back();
    }

    public function requests()
    {
    	$uid = auth()->user()->id;

    	$friendrequests = DB::table('friendships')->rightJoin('users', 'users.id', '=', 'friendships.requester')->where('status', Null)->where('friendships.user_requested', '=', $uid)->get();

    	return view('friend.requests', compact('friendrequests'));
    }

    public function acceptfriends($id)
    {
        $uid = auth()->user()->id;

        $checkrequest = Friendship::where('requester', $id)
                        ->where('user_requested', $uid)
                        ->first();

        if($checkrequest){

            //echo "Si, Funciona";
        	
            $updateFriend = DB::table('friendships')->where('user_requested', $id)->where('requester', $uid)->update(['status' => 1]);

            if($updateFriend){

                return back()->with('message', 'Ahora Son Amigos');
            }
        }else{

			echo "no, Funciona";

            //return back()->with('message', 'Eres Amigo con este Usuario');
        }
    }
}
