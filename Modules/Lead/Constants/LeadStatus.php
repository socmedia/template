<?php

namespace Modules\Lead\Constants;

class LeadStatus
{
    const STATUS = [
        ['name' => 'Belum Diproses', 'slug_name' => 'belum-diproses'],
        ['name' => 'Diproses', 'slug_name' => 'diproses'],
        ['name' => 'Selesai', 'slug_name' => 'selesai'],
    ];

    /**
     * Return lead statuses
     *
     * @return void
     */
    public function getAll()
    {
        return collect(self::STATUS);
    }
}