<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Dashboard\Traits\GoogleAnalytics;
use Spatie\Analytics\Period;

class AnalyticsPerform extends Component
{
    use GoogleAnalytics;

    public $period = 7, $isHomePage;

    public function mount($isHomePage = false)
    {
        $this->isHomePage = $isHomePage;
    }

    public function getVisitorsAndPageViews($period)
    {
        return $this->fetchVisitorsAndPageViews(Period::days($period));
    }

    public function getMostVisitedPages($period)
    {
        return $this->fetchMostVisitedPages(Period::days($period));
    }

    public function totalVisitors()
    {
        $visitors_and_page_views = [
            // 'daily' => $this->getVisitorsAndPageViews(1),
            'weekly' => $this->getVisitorsAndPageViews(7),
            'monthly' => $this->getVisitorsAndPageViews(30),
            'yearly' => $this->getVisitorsAndPageViews(365),
        ];

        // Daily
        // $daily = null;
        // foreach ($visitors_and_page_views['daily'] as $day) {
        //     $daily += $day['visitors'];
        // }

        // Weekly
        $weekly = null;
        foreach ($visitors_and_page_views['weekly'] as $week) {
            $weekly += $week['visitors'];
        }

        // Monthly
        $monthly = null;
        foreach ($visitors_and_page_views['monthly'] as $month) {
            $monthly += $month['visitors'];
        }

        // Yearly
        $yearly = null;
        foreach ($visitors_and_page_views['yearly'] as $year) {
            $yearly += $year['visitors'];
        }

        return [
            // 'daily' => $daily,
            'weekly' => $weekly,
            'monthly' => $monthly,
            'yearly' => $yearly,
        ];
    }

    public function render()
    {
        return view('livewire.analytics-perform', [
            'most_visited_pages' => $this->getMostVisitedPages($this->period),
            'visitors_and_page_views' => $this->getVisitorsAndPageViews($this->period),
            'visitors' => $this->totalVisitors(),
        ]);
    }
}
