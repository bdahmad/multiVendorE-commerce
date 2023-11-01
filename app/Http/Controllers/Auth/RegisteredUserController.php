<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'name' => ['required', 'string','max:25'],
            'username' => ['required', 'string','max:25', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:'.User::class],
            'phone' => ['required', 'max:20', 'unique:'.User::class],
            'password' => ['required', 'min:3'],
            'confirm_password' => ['required','same:password'],
        ]);

        $slug = uniqid('u' . rand());

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'slag' => $slug,
            'role_id' => 4,
            'status_id' => 1,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('login');
    }
}
