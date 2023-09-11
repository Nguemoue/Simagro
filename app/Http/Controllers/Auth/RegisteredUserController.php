<?php

namespace App\Http\Controllers\Auth;

use App\Constant\ReturnStatus;
use App\Http\Controllers\Controller;

use App\Models\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Client::class],
            "ville"=>["required","string"],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);
        $user = Client::query()->create([
            'nom' => $request->input('nom'),
            "prenom"=>$request->input("prenom"),
            "bp"=>$request->input("bp"),
            "pays"=>$request->input("pays"),
            "telephone"=>$request->input("telephone"),
            "type_compte"=>$request->input("type_compte"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input("password")),
            "ville"=>$request->input("ville")
        ]);
        event(new Registered($user));

        return redirect()->route("login")->with(ReturnStatus::SUCCESS,__('compte creer avec success'));
    }
}
