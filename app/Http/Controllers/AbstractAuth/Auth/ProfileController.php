<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;

abstract class ProfileController extends Controller implements
GuardInterface,
RouteNamePrefixInterface,
ViewPrefixInterface
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view($this->getViewPrefix() . 'profile.edit', [
            'user' => $request->user($this->getGuard()),
        ]);
    }

   /**
     * Update the user's profile information.
     * 
     * @param  Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $rule = [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', 'unique:'.$request->user($this->getGuard()).',email,'. $request->user($this->getGuard())->id],
        ];
        
        $request->user($this->getGuard())->fill($request->validated());

        if ($request->user($this->getGuard())->isDirty('email')) {
            $request->user($this->getGuard())->email_verified_at = null;
        }

        $request->user($this->getGuard())->save();

        if($request->has('email')){
            event(new Registered($request->user($this->getGuard())));
        }
        
        return Redirect::route($this->getRouteNamePrefix().'profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user($this->getGuard());

        Auth::guard($this->getGuard())->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return Redirect::to('/');
        return Redirect::route('welcome');
    }
}
