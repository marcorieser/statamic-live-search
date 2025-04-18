<?php

namespace MarcoRieser\LiveSearch\Http\Livewire;

class LiveSearch extends Search
{
    public $template;
    public $index;

    public function mount(string $template = null, string $index = null)
    {
        // In case no template has been defined, we will fall back to a default layout.
        $this->template = $template ?? 'live-search::dropdown';

        // An index can be null. In that case, all indexes will get searched.
        $this->index = $index;
    }

    public function render()
    {
        return view($this->template, [
            'results' => $this->search($this->q, $this->index),
        ]);
    }
}
