<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Image;

class UserController extends Controller
{

    // user login page show
    public function login_page(){
        return view('login');
    }

         /**
     * Destroy an authenticated session. or  logout here
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('dashboard', compact('userData'));
    }

    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('register');
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

        if($request->hasFile('image')){

            $image = $request->file('image');
            $customeName = "U".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/user/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'photo' => $customeName,
                'slag' => $slug,
                'role_id' => 4,
                'status_id' => 1,
                'password' => Hash::make($request->password),
            ]);


            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }else{

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

            return redirect(RouteServiceProvider::HOME);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}