<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestRedirectController extends Controller
{
    //

    public function __invoke()
    {
        //return redirect()->away('https:///google.com');

//         return redirect()->action([LibraryUserController::class], ['id' => 0]);

//         return redirect()->action([MySecondUserController::class, "showUser"]);

        return redirect()->route('books');


    }
}
