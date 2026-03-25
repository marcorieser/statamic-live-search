<?php

namespace MarcoRieser\LiveSearch\Http\Livewire;

use Livewire\Component;
use MarcoRieser\LiveSearch\Traits\SearchFacade;

abstract class Search extends Component
{
    use SearchFacade;

    public string $q = '';

    protected $queryString = [
        'q' => ['except' => ''],
    ];

    abstract public function render();
}
