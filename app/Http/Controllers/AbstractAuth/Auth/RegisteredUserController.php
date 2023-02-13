<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ModelInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;

abstract class RegisteredUserController extends Controller implements
ViewPrefixInterface,
GuardInterface,
RouteNamePrefixInterface,
ModelInterface
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view($this->getViewPrefix() . 'auth.register');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.$this->getModel()],
            // 'phone' => ['required', 'regex:/^01[0125][0-9]{8}$/', 'unique:'.$this->getModel()],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = $this->getModel()::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard($this->getGuard())->login($user);

        return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
    }
}
