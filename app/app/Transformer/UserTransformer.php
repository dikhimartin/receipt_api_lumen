<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract
{
    function transform(User $user){
        return[
            'id' =>$user->id,
            'fullname'=>$user->fullname,
            'email'=>$user->email,
            'city'=>$user->city,
            'status'=>$user->status,
            'role' => $user->role

        ];
    }
}