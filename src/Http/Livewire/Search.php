<?php

namespace MarcoRieser\LiveSearch\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class Search extends Component
{
    public string $q = '';

    public string $query = 'q';

    public string $template = 'live-search::dropdown';

    public array $data = [];

    public function render(): \Illuminate\Contracts\View\View|Application|Factory|View
    {
        return view($this->template);
    }

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
