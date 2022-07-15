<?php

namespace Modules\Dashboard\Traits;

use Analytics;
use Illuminate\Support\Collection;
use Spatie\Analytics\Period;

trait GoogleAnalytics
{
    public function fetchVisitorsAndPageViews(Period $period): Collection
    {
        return Analytics::fetchVisitorsAndPageViews($period);
    }

    public function fetchMostVisitedPages(Period $period): Collection
    {
        return Analytics::fetchMostVisitedPages($period);
    }

}
