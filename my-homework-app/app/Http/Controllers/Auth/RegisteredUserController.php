<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'isAdmin' => ['boolean'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname || '',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        try {
            Mail::to('shevchenko-bg@yandex.ru')
                ->send(new Welcome($user));

            Log::info('Письмо отправлено', ['email' => $user->email]);
        } catch (\Exception $e) {
            Log::error('Ошибка отправки письма', ['error' => $e->getMessage()]);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
