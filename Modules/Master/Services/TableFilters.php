<?php

namespace Modules\Master\Services;

class TableFilters
{
    /**
     * Generate table filters
     *
     * @return array
     */
    public static function handle(): array
    {
        return [
            'category' => [
                'query' => null,
                'reset_method' => 'resetCategory',
            ],
            'type' => [
                'query' => null,
                'reset_method' => 'resetType',
            ],
            'status' => [
                'query' => null,
                'reset_method' => 'resetStatus',
            ],
            'search' => [
                'query' => null,
                'reset_method' => 'resetSearch',
            ],
            'sort' => [
                'query' => [null, null],
                'reset_method' => 'resetFilter',
            ],
        ];
    }
}