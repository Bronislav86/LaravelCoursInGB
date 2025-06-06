<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestFormController extends Controller
{
    public function showForm()
    {
        return view('myForm');
    }

    public function postForm(Request $request)
    {
        $name = $request->input('my_name');
        $pswd = $request->input('password');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $category = $request->input('category');

        echo $name . ' ' . $pswd . ' ' . $age . ' ' . $gender;
        print_r($category);
    }
}
 //Видео 2 05:37
