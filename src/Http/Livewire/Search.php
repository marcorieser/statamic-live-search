<?php

namespace MarcoRieser\LiveSearch\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class Search extends Component
{
    public ?string $index = null;

    public int $limit = 10;

    public ?int $offset = null;

    public string $query = 'q';

    public string $search = '';

    public ?string $site = null;

    public bool $supplement_data = true;

    public string $template = 'live-search::dropdown';

    public function render(): \Illuminate\Contracts\View\View|Application|Factory|View
    {
        return view($this->template);
    }

    protected function queryString(): array
    {
        return [
            'search' => [
                'as' => $this->query,
                'except' => '',
            ],
        ];
    }
}
