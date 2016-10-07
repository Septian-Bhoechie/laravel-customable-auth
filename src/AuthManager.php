<?php

namespace Bhoechie\CustomableAuth;

use Bhoechie\CustomableAuth\Providers\DatabaseUserProvider;
use Bhoechie\CustomableAuth\Providers\EloquentUserProvider;
use Illuminate\Auth\AuthManager as OriginalAuthManager;

class AuthManager extends OriginalAuthManager
{

    /**
     * Create an instance of the database user provider.
     *
     * @param  array  $config
     * @return \Illuminate\Auth\DatabaseUserProvider
     */
    protected function createDatabaseProvider($config)
    {
        $connection = $this->app['db']->connection();
        return new DatabaseUserProvider($connection, $this->app['hash'], $config['table']);
    }

    /**
     * Create an instance of the Eloquent user provider.
     *
     * @param  array  $config
     * @return \Illuminate\Auth\EloquentUserProvider
     */
    protected function createEloquentProvider($config)
    {
        return new EloquentUserProvider($this->app['hash'], $config['model']);
    }
}
