<?php

namespace App\Constants;

class FilterLabel
{
    public static function allFilters()
    {
        return [
            [
                'date_in_string' => dateTimeTranslated(now()->toDateString(), 'M d, Y'),
                'label' => 'Hari ini',
                'value' => 'today',
            ],
            [
                'date_in_string' => dateTimeTranslated(now()->subDay(1)->toDateString(), 'M d, Y'),
                'label' => 'Kemarin',
                'value' => 'yesterday',
            ],
            [
                'date_in_string' => dateTimeTranslated(now()->startOfWeek()->toDateString(), 'M d, Y') . ' - ' . dateTimeTranslated(now()->endOfWeek()->toDateString(), 'M d, Y'),
                'label' => 'Minggu ini',
                'value' => 'this-week',
            ],
            [
                'date_in_string' => dateTimeTranslated(now()->startOfMonth()->toDateString(), 'M d, Y') . ' - ' . dateTimeTranslated(now()->endOfMonth()->toDateString(), 'M d, Y'),
                'label' => 'Bulan ini',
                'value' => 'this-month',
            ],
            [
                'date_in_string' => dateTimeTranslated(now()->startOfyear()->toDateString(), 'M d, Y') . ' - ' . dateTimeTranslated(now()->endOfYear()->toDateString(), 'M d, Y'),
                'label' => 'Tahun ini',
                'value' => 'this-year',
            ],
            [
                'date_in_string' => dateTimeTranslated(now()->subDays(6)->toDateString(), 'M d, Y') . ' - ' . dateTimeTranslated(now()->toDateString(), 'M d, Y'),
                'label' => '7 Hari terakhir',
                'value' => 'last-7-days',
            ],
            [
                'date_in_string' => dateTimeTranslated(now()->subDays(29)->toDateString(), 'M d, Y') . ' - ' . dateTimeTranslated(now()->toDateString(), 'M d, Y'),
                'label' => '30 Hari terakhir',
                'value' => 'last-30-days',
            ],
            [
                'date_in_string' => dateTimeTranslated(now()->subDays(89)->toDateString(), 'M d, Y') . ' - ' . dateTimeTranslated(now()->toDateString(), 'M d, Y'),
                'label' => '90 Hari terakhir',
                'value' => 'last-90-days',
            ],
        ];
    }
}