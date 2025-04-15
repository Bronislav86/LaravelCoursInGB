<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class MySecondUserController extends Controller
{
    //
    public function showUser()
    {
        $user = new \StdClass();
        $user->first_name = 'Test';
        $user->last_name = 'User';
        $user->id = 1;



        return response()->json($user);
    }
}
