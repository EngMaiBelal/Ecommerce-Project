<?php

namespace App\Http\Controllers\User\Auth;

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
use App\Http\Controllers\AbstractAuth\Auth\RegisteredUserController as AbstractRegisteredUserController;

class RegisteredUserController extends AbstractRegisteredUserController
{    
    /**
     * model
     *
     * @var string
     */
    private $model = User::class;   

    /**
     * viewPrefix
     *
     * @var string
     */
    private $viewPrefix = 'user.';   

    /**
     * guard
     *
     * @var string
     */
    private $guard = 'web';    

    /**
     * routeNamePrefix
     *
     * @var string
     */
    private $routeNamePrefix = 'users.';
    
    /**
     * Get the value of viewPrefix
     * 
     * @return string
     */
    public function getViewPrefix() :string
    {
        return $this->viewPrefix;
    }

    /**
     * Set the value of viewPrefix
     *      
     * @param  string  $viewPrefix  viewPrefix
     * 
     * @return void
     */
    public function setViewPrefix(string $viewPrefix) :void
    {
        $this->viewPrefix = $viewPrefix;
    }

    /**
     * Get the value of guard
     * 
     * @return string
     */
    public function getGuard():string
    {
        return $this->guard;
    }

    /**
     * Set the value of guard
     *      
     * @param  string  $guard  guard
     * 
     * @return void
     */
    public function setGuard(string $guard): void
    {
        $this->guard = $guard;
    }

    /**
     * Get the value of routeNamePrefix
     * 
     * @return string
     */
    public function getRouteNamePrefix() :string
    {
        return $this->routeNamePrefix;
    }

    /**
     * Set the value of routeNamePrefix
     * 
     * @param  string  $routeNamePrefix  routeNamePrefix
     * 
     * @return void
     */
    public function setRouteNamePrefix(string $routeNamePrefix): void
    {
        $this->routeNamePrefix = $routeNamePrefix;
    }

    /**
     * Get the value of model
     * 
     * @return string
     * 
     */
    public function getModel():string
    {
        return $this->model;
    }

    /**
     * Set the value of model
     * 
     * @param  string  $model  model
     * 
     * @return void
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
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
            'phone' => ['required', 'regex:/^01[0125][0-9]{8}$/', 'unique:'.$this->getModel()],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = $this->getModel()::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard($this->getGuard())->login($user);

        return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
    }
}
