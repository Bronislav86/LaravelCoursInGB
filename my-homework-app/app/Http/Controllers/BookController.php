<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;


class BookController extends Controller
{
    public function index()
    {
        return view('bookForm');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => ['required','nullable', 'unique:books', 'max:255'],
            'author' => ['required', 'nullable', 'max:100'],
            'genre' => ['required']
        ]);

        $book = new Book($request->all());

        $book->save();
        print_r($book);
    }
}
