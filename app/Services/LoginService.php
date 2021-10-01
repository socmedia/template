<?php

namespace App\Services;

use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class LoginService
{
    public $agent;
    public $user;

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

    public function checkExistingUserLoginInfo()
    {
        if ($this->user->login_info) {
            $info = unserialize($this->user->login_info);

            if (count($info) >= 1) {
                $duplicate = $this->checkDuplicateInfo($info);

                if (!$duplicate) {
                    array_push($info, $this->generateLoginInfo());
                    $this->user->login_info = serialize($info);
                }
            }

        } else {
            $this->user->login_info = serialize([$this->generateLoginInfo()]);
        }

        $this->user->save();
        return unserialize($this->user->login_info);
    }

    public function checkIp()
    {
        // request()
    }

    public function checkDuplicateInfo($info)
    {
        $duplicateIp = false;
        $loginIp = request()->ip() == '127.0.0.1' ? 'unknown' : request()->ip();

        foreach ($info as $value) {
            if ($value['ip'] == $loginIp) {
                $duplicateIp = true;
            }
        }

        return $duplicateIp;
    }

}