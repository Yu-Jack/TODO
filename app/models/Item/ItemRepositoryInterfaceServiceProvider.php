<?php namespace Item\Repositories;

use Illuminate\Support\ServiceProvider;

class ItemRepositoryInterfaceServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('\Item\Repositories\ItemRepositoryInterface', function()
        {
            return new ItemRepository;
        });
    }
}