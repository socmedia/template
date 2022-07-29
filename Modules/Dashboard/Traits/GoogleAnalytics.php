<?php

namespace Modules\Dashboard\Traits;

use Analytics;
use Spatie\Analytics\Exceptions\InvalidConfiguration;
use Spatie\Analytics\Period;

trait GoogleAnalytics
{
    public function fetchVisitorsAndPageViews(array $period)
    {
        $dates = Period::create($period['startDate'], $period['endDate']);

        try {
            return Analytics::fetchVisitorsAndPageViews($dates);
        } catch (InvalidConfiguration $exception) {
            throw new InvalidConfiguration($exception->getMessage(), 400);
        }
    }

    public function fetchMostVisitedPages(array $period, $maxResults = 20)
    {
        $dates = Period::create($period['startDate'], $period['endDate']);

        try {
            return Analytics::fetchMostVisitedPages($dates, $maxResults);
        } catch (InvalidConfiguration $exception) {
            throw new InvalidConfiguration($exception->getMessage(), 400);
        }
    }

    public function performQuery(array $period, $metrics = 'ga:month')
    {
        $dates = Period::create($period['startDate'], $period['endDate']);

        try {
            return Analytics::performQuery($dates, 'ga:sessions', [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => $metrics,
            ]);
        } catch (InvalidConfiguration $exception) {
            throw new InvalidConfiguration($exception->getMessage(), 400);
        }
    }

    public function sessionAndPageViews($activeFilter = 'this-year')
    {
        $switch = switchDate($activeFilter);
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
}