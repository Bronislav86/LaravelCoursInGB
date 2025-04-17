<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class FormProcessor extends Controller
{

    //
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {

//         Вариант 1

//         $user = new \StdCLass();
//
//          $user->first_name = $request->input('user_name');
//          $user->user_lastname = $request->input('user_last_name');
//          $user->user_email = $request->input('user_email');

//          Вариант 2

            $user = [
            'first_name' => $request->input('user_name'),
            'user_lastname' => $request->input('user_last_name'),
            'user_email' => $request->input('user_email')
            ];

//         return response()->json($user);

           return view('greeting', ['user' => $user]);
    }
}
