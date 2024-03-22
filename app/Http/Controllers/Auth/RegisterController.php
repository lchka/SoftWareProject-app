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
use App\Models\Role;
use Illuminate\Foundation\Auth\RedirectsUsers;

class RegisterController extends Controller
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
    public function register(Request $request)
    {
        dd('Inside register method');
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
    
        $role = Role::where('name', $request->role)->first();
    
        if ($role) {
            $user->roles()->attach($role);
        }
    
        return redirect()->route('welcome');
    }
    
    public function store(Request $request): RedirectResponse
    {
        dd('Inside store method');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Assign the 'user' role to the new user by default
        $role_user = Role::where('name', 'user')->first();
        $user->roles()->attach($role_user);
        return redirect()->route('welcome'); // Adjust this route to your actual home route
    }
    
}
