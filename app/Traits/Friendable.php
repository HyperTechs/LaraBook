<?php

namespace App\Traits;

use App\Friendship;

trait Friendable {

	public function test(){

		return 'hi';
	}

	public function addfriends($id)
    {
	    $friendship = Friendship::create([

	        'requester' => $this->id, //Id del usuario a enviar para ser amigo
            'user_requested' => $id, // Este es el Id del Usuario logueado
        ]);

	    if($friendship){
	        return $friendship;
        }

        return 'failed';
        
    }
}