<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $table, $currentPage, $lastPage, $perPage, $total, $startTotal, $withPerPage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($table, $withPerPage = true)
    {
        $this->table = $table;
        $currentPage = $table->currentPage();
        $lastPage = $table->lastPage();
        $perPage = $table->perPage();

        $total = $currentPage != $lastPage ?
        ($currentPage * $perPage) :
        (($currentPage - 1) * $perPage) + $table->count();
        $startTotal = $currentPage != $lastPage ? $total - 9 : ($table->total() - $table->count()) + 1;

        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->perPage = $perPage;
        $this->total = $total;
        $this->startTotal = $startTotal;
        $this->withPerPage = $withPerPage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}