<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
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
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country' => ['required', 'string', 'max:50'],
            'province' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'postal_code' => ['required', 'string', 'max:20'],
            'street' => ['required', 'string', 'max:100'],
            'number' => ['required', 'string', 'max:10'],
            'apartment_number' => ['nullable', 'string', 'max:10'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',

        ]);

        //Añado esto a breeze para que cuando me cree el usuario me cree la direccion
        $user->addresses()->create([
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'street' => $request->street,
            'number' => $request->number,
            'apartment_number' => $request->apartment_number,
        ]);

        event(new Registered($user));

        Auth::login($user);

        //return redirect(route('dashboard', absolute: false));
        return redirect()->route('edition.index')->with('succes', 'Cuenta creada correctamente');
    }
}
