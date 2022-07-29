<?php

namespace App\Http\Livewire;

use App\Constants\filterLabel;
use Livewire\Component;
use Modules\Dashboard\Traits\GoogleAnalytics;

class AnalyticsPerform extends Component
{
    use GoogleAnalytics;

    public $period = 7, $isHomePage;

    public $analyticsConfig = [
        'label' => null,
        'active' => 'this-month',
    ];

    public function mount($isHomePage = false)
    {
        $this->isHomePage = $isHomePage;
        $this->analyticsConfig['label'] = dateTimeTranslated(now()->startOfyear()->toDateString(), 'M d, Y') . ' - ' . dateTimeTranslated(now()->endOfYear()->toDateString(), 'M d, Y');
    }

    public function sessionAndPageViews()
    {
        $switch = switchDate($this->analyticsConfig['active']);
        $metric = $switch['metrics'];
        $data = $this->performQuery($switch, $metric);

        $metrics = array_map(function ($row) use ($metric) {
            if ($metric == 'ga:date') {
                return dateTimeTranslated($row[0], 'd M');
            } elseif ($metric == 'ga:week') {
                return 'Ming. Ke ' . $row[0];
            } elseif ($metric == 'ga:month') {
                return dateTimeTranslated('01-' . $row[0] . '-' . date('Y'), 'M Y');
            } elseif ($metric == 'ga:yearMonth') {
                return dateTimeTranslated($row[0] . '01', 'M Y');
            } else {
                return $row[0];
            }
        }, $data->rows);

        $sessions = array_map(function ($row) {
            return $row[1];
        }, $data->rows);

        $pageViews = array_map(function ($row) {
            return $row[2];
        }, $data->rows);

        return [
            'metrics' => $metrics,
            'sessions' => $sessions,
            'page_views' => $pageViews,
        ];
    }

    public function filterAnalyticsData($value, $label)
    {
        $this->analyticsConfig['active'] = $value;
        $this->analyticsConfig['label'] = $label;
        $this->dispatchBrowserEvent('update-chart');
    }

    public function render()
    {
        // dd($this->sessionAndPageViews());
        return view('livewire.analytics-perform', [
            'analytics_data' => $this->sessionAndPageViews(),
            'filter_labels' => FilterLabel::allFilters(),
        ]);
    }
}