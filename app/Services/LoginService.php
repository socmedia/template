<?php

namespace App\Services;

use App\Models\User;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class LoginService
{
    public $agent;

    /**
     * Class constructor.
     */
    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
        $this->user = auth()->user();
    }

    public function getUserLocation(): array
    {
        // result for production
        // $result = $this->location->get(request()->ip())->toArray();

        // result for development only
        $ip = request()->ip() == '127.0.0.1' ? false : request()->ip();
        $loc = Location::get($ip);

        if ($loc && $ip) {
            $result = $loc->toArray();
            array_pop($result);
            return $result;
        }

        return [
            'ip' => 'unknown',
            'countryName' => 'unknown',
            'countryCode' => 'unknown',
            'regionCode' => 'unknown',
            'regionName' => 'unknown',
            'cityName' => 'unknown',
            'zipCode' => null,
            'isoCode' => null,
            'postalCode' => null,
            'latitude' => null,
            'longitude' => null,
            'metroCode' => null,
            'areaCode' => 'CA',
        ];
    }

    public function getUserAgent(): array
    {
        return [
            'browser' => $this->agent->browser(),
            'platform' => $this->agent->platform(),
            'deviceType' => $this->agent->deviceType(),
            'device' => $this->agent->device(),
            'loginDate' => now()->toDateTimeString(),
        ];
    }

    public function generateLoginInfo()
    {
        return array_merge(
            $this->getUserLocation(),
            $this->getUserAgent()
        );
    }

    public function checkExistingUserLoginInfo(User $user)
    {
        if ($user->login_info) {
            $info = unserialize($user->login_info);

            if (count($info) >= 1) {
                $duplicate = $this->checkDuplicateInfo($info);

                if (!$duplicate) {
                    array_push($info, $this->generateLoginInfo());
                    return $user->login_info = serialize($info);
                }
            }

        }

        return $user->login_info = serialize([$this->generateLoginInfo()]);
    }

    public function updateUserLoginInfo(User $user)
    {
        $this->checkExistingUserLoginInfo($user);
        return $user->save();
    }

    public function checkIp()
    {
        // request()
    }

    public function checkDuplicateInfo($info)
    {
        $duplicateIp = false;
        $loginIp = request()->ip() == '127.0.0.1' ? 'unknown' : request()->ip();

        foreach ($info as $i => $value) {
            if ($value == $loginIp) {
                $duplicateIp = true;
            }
        }

        return $duplicateIp;
    }

}