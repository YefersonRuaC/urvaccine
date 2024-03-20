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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol' => ['required', 'numeric', 'between:1,2'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'numeric', 'digits_between:7,10'],
            'tipo_doc' => ['required', 'string', 'in:cc,ce,pa,rc'],
            'documento' => ['required', 'unique:'.User::class],
            'genero' => ['required', 'string', 'in:masculino,femenino'],
            'nacimiento' => ['required', 'date'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'tipo_doc' => $request->tipo_doc,
            'documento' => $request->documento,
            'genero' => $request->genero,
            'nacimiento' => $request->nacimiento
        ]);

        // event(new Registered($user));

        Auth::login($user);

        if($request->user()->rol == 3) {

            return redirect(RouteServiceProvider::HOME);

        } elseif($request->user()->rol == 1) {

            return redirect(RouteServiceProvider::PERSONA);

        } elseif($request->user()->rol == 2) {

            return redirect(RouteServiceProvider::MASCOTA);
        }
        
        return redirect(RouteServiceProvider::HOME);
    }
}
