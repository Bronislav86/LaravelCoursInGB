<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestSecurrityController extends Controller
{
    public function show()
    {
        return View('testcsrf');
    }

    public function post(Request $request)
    {
        echo $request->input('test_name');
    }
}
