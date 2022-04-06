<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class WithFilter extends Component
{
    public $table_headers = null,
    $table_body = null,
    $filters = null,
    $pagination = null,
    $disabled = [],
    $sortable = null,
    $sortableGroup = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $table_headers = null,
        $table_body = null,
        $filters = null,
        $pagination = null,
        array $disabled = [],
        $sortable = null,
        $sortableGroup = null
    ) {
        $this->table_headers = $table_headers;
        $this->table_body = $table_body;
        $this->filters = $filters;
        $this->pagination = $pagination;
        $this->disabled = $disabled;
        $this->sortable = $sortable;
        $this->sortableGroup = $sortableGroup;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.with-filter');
    }
}