<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Utillities\Generate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Modules\User\Models\Entities\UsersSetting;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'min:8', 'max:191', 'confirmed', Rules\Password::defaults()],
        ]);

        $id = Generate::ID(32);

        $user = User::create([
            'id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'avatar_url' => url(asset('assets/default/images/user_avatar.png')),
            'password' => Hash::make($request->password),
        ]);

        UsersSetting::create([
            'user_id' => $id,
            'lang' => 'en',
        ]);

        $user->assignRole('User');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}