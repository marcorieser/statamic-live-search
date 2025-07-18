<?php

namespace MarcoRieser\LiveSearch;

use Livewire\Livewire;
use MarcoRieser\LiveSearch\Http\Livewire\LiveSearch;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $viewNamespace = 'live-search';

    public function bootAddon(): void
    {
        $this->bootSearchComponent();
        $this->bootPublishableViews();
    }

    protected function bootSearchComponent(): void
    {
        Livewire::component('search', LiveSearch::class);
    }

    protected function bootPublishableViews(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/live-search'),
        ], 'live-search:views');
    }
}
