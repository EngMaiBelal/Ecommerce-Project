<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;

abstract class ConfirmablePasswordController extends Controller implements
ViewPrefixInterface,
GuardInterface,
RouteNamePrefixInterface
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view($this->getViewPrefix() . 'auth.confirm-password');
    }
    
    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard($this->getGuard())->validate([
            'email' => $request->user($this->getGuard())->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->route($this->getRouteNamePrefix() . '.dashboard');
    }
}
