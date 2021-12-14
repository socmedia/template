<?php

namespace App\Contracts;

use Illuminate\Support\Facades\Schema;

trait DatabaseTable
{
    /**
     * Get column names collection from database table
     *
     * @param  string $table
     * @return void
     */
    public function getTableColumns(string $table): ?array
    {
        return Schema::getColumnListing($table);
    }

}