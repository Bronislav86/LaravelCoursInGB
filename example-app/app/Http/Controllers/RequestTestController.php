<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestTestController extends Controller
{
    public function testRequest(Request $request)
    {

    //Получаем поля по отдельности

//         $firstName = $request->input('first_name', 'No name');
//         $lastName = $request->input('last_name', 'No name');

//             echo $firstName . ' ' . $lastName;

// Получаем все поля сразу

//         $requestParameters = $request->all();
//
//         print_r ($requestParameters['first_name']);

//Через коллекции

            $requestParameters = $request->collect();

            $requestParameters->each(function ($field){
                echo $field . ' ';
            });
    }
}
