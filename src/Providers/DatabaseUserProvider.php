<?php

namespace Bhoechie\CustomableAuth\Providers;

use Illuminate\Auth\DatabaseUserProvider as OriginalDatabaseUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class DatabaseUserProvider extends OriginalDatabaseUserProvider
{

    /**
     * Override Password Credential Name.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $passwordName = app('config')->get('customableauth.password_field');
        $plain = $credentials['password'];

        return $this->hasher->check($plain, $user->{$passwordName});
    }
}
