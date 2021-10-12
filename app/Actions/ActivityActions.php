<?php

namespace App\Actions;

use App\Utillities\Generate;
use Illuminate\Support\Carbon;
use Jenssegers\Agent\Agent;
use Modules\User\Models\Entities\UsersActivity;
use Stevebauman\Location\Facades\Location;

class ActivityActions
{
    /**
     * Define Agent
     *
     * @var Jenssegers\Agent\Agent $agent
     */
    protected $agent;

    /**
     * Define ip address
     *
     * @var Illuminate\Http\Request $ip
     */
    protected $ip;

    /**
     * Define location
     *
     * @var Stevebauman\Location\Facades\Location $location
     */
    protected $location;

    /**
     * Define date time now
     *
     * @var Illuminate\Support\Carbon $dateTime
     */
    protected $dateTime;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->agent = new Agent();
        $this->ip = request()->ip();
        $this->location = new Location();
        $this->dateTime = now()->toDateTimeString();
    }

    /**
     * Set default location
     *
     * @return array
     */
    private function defaultLocation(): array
    {
        return [
            'ip_address' => 'unknown',
            'country_name' => 'unknown',
            'country_code' => 'unknown',
            'region_code' => 'unknown',
            'region_name' => 'unknown',
            'city_name' => 'unknown',
            'zip_code' => null,
            'iso_code' => null,
            'postal_code' => null,
            'latitude' => null,
            'longitude' => null,
            'metro_code' => null,
            'area_code' => null,
        ];
    }

    /**
     * Set default user agent
     *
     * @return array
     */
    private function generateClientAgent(): array
    {
        return [
            'browser' => $this->agent->browser(),
            'platform' => $this->agent->platform(),
            'device_type' => $this->agent->deviceType(),
            'device' => $this->agent->device(),
        ];
    }

    /**
     * Generate user location
     *
     * @return array
     */
    private function generateUserLocation(): array
    {
        $result = $this->location::get($this->ip);

        // if geo location found
        if ($result) {
            $result = $result->toArray();

            return [
                'ip_address' => $result['ip'],
                'country_name' => $result['countryName'],
                'country_code' => $result['countryCode'],
                'region_code' => $result['regionCode'],
                'region_name' => $result['regionName'],
                'city_name' => $result['cityName'],
                'zip_code' => $result['zipCode'],
                'iso_code' => $result['isoCode'],
                'postal_code' => $result['postalCode'],
                'latitude' => $result['latitude'],
                'longitude' => $result['longitude'],
                'metro_code' => $result['metroCode'],
                'area_code' => $result['areaCode'],
            ];
        }

        // return to default if geo location not found
        return $this->defaultLocation();
    }

    /**
     * Generate timing activity
     *
     * @param  string $activity
     * @return void
     */
    private function generateTiming($activity)
    {
        if ($activity == 'login') {
            return [
                'login_at' => $this->dateTime,
                'logout_at' => null,
                'last_activity' => $this->dateTime,
            ];
        }

        return [
            'login_at' => null,
            'logout_at' => $this->dateTime,
            'last_activity' => $this->dateTime,
        ];
    }

    /**
     * Find activity by specific user
     *
     * @param  App\Models\User $user
     * @param  string $activity
     * @return UsersActivity
     */
    public function checkDuplicateActivity($user, $activity)
    {
        return UsersActivity::where([
            'user_id' => $user->id,
            'activity' => $activity,
            'ip_address' => $this->ip != '127.0.0.1' ?: 'unknown',
        ])->first();
    }

    /**
     * Merge all information
     *
     * @param  string $userId
     * @param  string $activity
     * @return void
     */
    public function mergedActivity($userId, $activity): array
    {
        return array_merge([
            'id' => Generate::ID(32),
            'user_id' => $userId,
            'activity' => $activity,
        ],
            $this->generateUserLocation(),
            $this->generateClientAgent(),
            $this->generateTiming($activity)
        );
    }
}