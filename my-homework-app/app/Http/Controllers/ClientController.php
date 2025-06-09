<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();

        return view('clients', ['clients' => $client]);
    }

    public function get($id)
    {
        $client = Client::find($id);

        return view('clients', ['client' => $client]);
    }

    public function create()
    {
        return view('clientForm', ['client' => null]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required','nullable', 'unique:clients', 'max:100'],
            'surname' => ['required', 'nullable', 'max:100'],
            'email' => ['required']
        ]);

        $client = new Client($request->all());

        $client->save();

        return Redirect::route('show_clients', ['client' => $client]);
    }
}
