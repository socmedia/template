<?php

namespace Modules\Marketing\Services\Client;

trait TableConfig
{

    /**
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Gambar',
            'column_name' => 'media_path',
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Nama',
            'column_name' => 'name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Posisi',
            'column_name' => 'position',
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Ditampilkan?',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Aksi',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
    ];

    /**
     * Set all properties default values based on query string value
     *
     * @return void
     */
    public function mountDefaultValues()
    {
        $this->defaultPropertiesValueBeforeComponentRendered();
    }

    /**
     * Set properties default value before component was rendered
     * Set properties value with query string value
     *
     * @return void
     */
    public function defaultPropertiesValueBeforeComponentRendered()
    {
        $this->sort = request('sort') ?: 'position';
        $this->order = request('order') ?: 'asc';
        $this->is_active = request('is_active');
        $this->search = request('search');
    }
}