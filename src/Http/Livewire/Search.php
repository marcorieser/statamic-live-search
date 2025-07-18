<?php

namespace MarcoRieser\LiveSearch\Http\Livewire;

use Livewire\Component;
use MarcoRieser\LiveSearch\Traits\SearchFacade;

abstract class Search extends Component
{
    use SearchFacade;

    public string $q = '';

    public string $query = 'q';

    protected function queryString(): array
    {
        return [
            'q' => [
                'as' => $this->query,
                'except' => '',
            ],
        ];
    }
}
