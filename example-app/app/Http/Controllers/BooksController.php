<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    //
    public function __invoke()
    {
        $books = DB::connection('second_mysql')->
        table('books')->select(['book_name', 'book_author', 'book_year', 'book_description'])->
        get();

        return view('listBooks', ['books' => $books]);
    }
}
