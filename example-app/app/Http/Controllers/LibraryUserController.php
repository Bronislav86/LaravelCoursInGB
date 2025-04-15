<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryUserController extends Controller
{
    protected $users = [
        ['id' => 0, 'username' => 'user1', 'first_name' => 'Vasiliy', 'last_name' => 'Vasiliev', 'list_of_books' => ['book1', 'book2', 'book3']],
        ['id' => 1, 'username' => 'user2', 'first_name' => 'Vitaliy', 'last_name' => 'Vitaliev', 'list_of_books' => ['book4', 'book5', 'book6']],

    ];
    //
    public function __invoke($id)
    {
        return view('userBooks', ['user' => $this->users[$id]]);
    }

}
