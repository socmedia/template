<?php

namespace App\View\Components\Analytics;

use App\Constants\FilterLabel;
use Illuminate\View\Component;
use Modules\Dashboard\Traits\GoogleAnalytics;

class SessionPageViewsChart extends Component
{
    use GoogleAnalytics;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.analytics.session-page-views-chart', [
            'filter_labels' => FilterLabel::allFilters(),
        ]);
    }
}