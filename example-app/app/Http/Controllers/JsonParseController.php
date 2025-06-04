<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonParseController extends Controller
{
    public function parseJson(Request $request)
    {
        var_dump($request->json()->all());
        echo '<br>';
        var_dump(json_decode($request->getContent()));
        echo '<br>';
        echo $request->json()->get('first_name');
    }
}
