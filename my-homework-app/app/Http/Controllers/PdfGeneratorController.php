<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use PDF;

class PdfGeneratorController extends Controller
{
    public function index($id)
    {
        try{
            $client = Client::where('id', $id)->first();
            // die($client);
        } catch(ModelNotFoundException $e){
            return response()->view('errors.custom-not-found', [], 404);
        }

        $data = [
        'id' => $client->id,
        'name' => $client->name,
        'surname' => $client->surname,
        'email' => $client->email
        ];
//         print_r($data);
//         echo '   ';
//         print_r($client);
//         die();

        $pdf = PDF::loadView('clients', ['clients' => null], $data);
        return $pdf->stream('resume.pdf');
    }
}
