<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;

abstract class EmailVerificationNotificationController extends Controller implements
GuardInterface,
RouteNamePrefixInterface
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user($this->getGuard())->hasVerifiedEmail()) {
            return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
        }

        $request->user($this->getGuard())->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
