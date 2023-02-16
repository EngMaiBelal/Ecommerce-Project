<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;

abstract class PasswordController extends Controller implements 
GuardInterface
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'.$this->getGuard],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user($this->getGuard())->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
