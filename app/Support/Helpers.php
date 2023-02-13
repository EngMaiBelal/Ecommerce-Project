<?php

use Illuminate\Database\Eloquent\Model;

/**
 * getGuardFromProvider
 *
 * @param  string $provider
 * @return string|null
 */
function getGuardFromProvider (string $provider) :?string {
    foreach (config('auth.guards') as $guard => $values)
    {
        if ($provider == $values['provider']) {
            return $guard;
        }
    }
    return null;
} 

/**
 * getProviderFromModel
 *
 * @param  object $model
 * @return string|null
 */
function getProviderFromModel(Model $model) :?string{
    foreach ( config('auth.providers') as $provider => $values){
        if( $model instanceof $values['model'] ){
            return $provider;
        }
    }
    return null;
}

/**
 * getGuardFromModel
 *
 * @param  object $model
 * @return string|null
 */
function getGuardFromModel(Model $model) :?string {
    $provider = getProviderFromModel($model);
    return getGuardFromProvider($provider);
}

/**
 * Get the value of routeGuardMap
 * 
 * Mapping between guardName and routeName
 * 
 * @return array
 */
function getRouteGuardMap(string $guard): string
{
    return config('auth.route_guard_map')[$guard]?? 'users.';
}