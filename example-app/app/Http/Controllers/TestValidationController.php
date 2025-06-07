<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;



class TestValidationController extends Controller
{
    public function show()
    {
        return View('workervalidation');
    }

    public function post(Request $request)
    {
            $validated = $request->validate([
                "fullname" => ['required'],
                "password" => ['min:5']
            ]);

    }
}
