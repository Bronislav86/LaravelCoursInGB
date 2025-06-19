<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    //
    public function showUsers()
    {
        DB::connection('mysql')->table('users')->insert([
            'first_name' => 'Nikolai',
            'last_name' => 'Nikolarv',
            'email' => 'nikolai@mail.ru'
        ]);
        DB::connection('mysql')->table('users')->insert([
            'first_name' => 'Nikolai',
            'last_name' => 'Nikolarv',
            'email' => 'nikolai@mail.ru'
        ]);
        DB::connection('mysql')->table('users')->insert([
            'first_name' => 'Nikolai',
            'last_name' => 'Nikolarv',
            'email' => 'nikolai@mail.ru'
        ]);

        $users = DB::connection('mysql')->table('users')->select(['first_name', 'email'])->get();
        return view('user', ['users' => $users]);
    }

    public function index()
    {
        return view('test');
    }

    public function store(Request $request)
    {
        $userData = ['username' => $request->username, 'email' => $request->email];

        return response()->json($userData);
    }

    public function getAllUsers()
    {
        $this->authorize('view-any', User::class);
        // Gate::authorize('view-users');
        return User::all();
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return $user;
    }
}
