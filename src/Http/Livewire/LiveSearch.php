<?php

namespace MarcoRieser\LiveSearch\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

class LiveSearch extends Search
{
    public ?string $index = null;

    public int $limit = 10;

    public ?string $site = null;

    public int $offset = 0;

    public bool $supplement_data = true;

    public string $template = 'live-search::dropdown';

    public function render(): \Illuminate\Contracts\View\View|Application|Factory|View
    {

        return view($this->template, [
            'results' => $this->search($this->q, $this->index, $this->limit, $this->site, $this->offset, $this->supplement_data),
        ]);
    }
}
