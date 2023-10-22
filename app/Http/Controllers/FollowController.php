<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(User $user)
    {
       if($user->private_account)
       {

           auth()->user()->following()->attach($user);
       }
       else{
        auth()->user()->following()->attach($user, ['confirmed'=>true]);

       }
        dd(auth()->user()->following()->where('user_id' ,$user->id));
        return back();
    }
}
