<?php

namespace App\Http\Livewire\Analytics;

use App\Constants\FilterLabel;
use Exception;
use Livewire\Component;
use Modules\Dashboard\Traits\GoogleAnalytics;

class MostVisited extends Component
{
    use GoogleAnalytics;

    public $analytics = [
        'label' => 'this-year',
        'heading' => null,
    ];

    public function mount()
    {
        $this->analytics['heading'] = dateTimeTranslated(now()->startOfyear()->toDateString(), 'M d, Y') . ' - ' . dateTimeTranslated(now()->endOfYear()->toDateString(), 'M d, Y');
    }

    public function getMostVisitedPages()
    {
        try {
            return $this->fetchMostVisitedPages(switchDate($this->analytics['label']), 10);
        } catch (Exception $exception) {
            session()->flash('analytics-failed', $exception->getMessage());
            return collect([]);
        }
    }

    public function filterAnalytics($label, $heading)
    {
        $this->analytics = [
            'label' => $label,
            'heading' => $heading,
        ];
    }

    public function render()
    {
        return view('livewire.analytics.most-visited', [
            'visited_pages' => $this->getMostVisitedPages(),
            'filter_labels' => FilterLabel::allFilters(),
        ]);
    }
}