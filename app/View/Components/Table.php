<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $header = [
        [
            'cell_name' => '',
            'sortable' => [
                'status' => false,
                'prop_name' => '', // wire:model.defer
                'order' => '',
            ],
            'additional_class' => null,
        ],
    ];

    public $body;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header = [], $body = [])
    {
        $this->header = $header;
        $this->body = $body;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}