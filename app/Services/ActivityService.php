<?php

namespace App\Services;

use App\Actions\ActivityActions;
use Modules\User\Models\Entities\UsersActivity;

class ActivityService extends ActivityActions
{
    public function generateUserActivity($user, $activity)
    {
        $existingActivity = $this->checkDuplicateActivity($user, $activity);

        if (!$existingActivity) {
            return $this->createNewActivity($user, $activity);
        }

        return $this->updateActivity($existingActivity, $activity);
    }

    public function createNewActivity($user, $activity)
    {
        return UsersActivity::create(
            $this->mergedActivity($user->id, $activity)
        );
    }

    public function updateActivity($existingActivity, $activity)
    {
        if ($activity == 'login') {
            $existingActivity->update([
                'login_at' => $this->dateTime,
                'logout_at' => null,
                'last_activity' => $this->dateTime,
            ]);
        }

        if ($activity == 'logout') {
            $existingActivity->update([
                'login_at' => null,
                'logout_at' => $this->dateTime,
                'last_activity' => $this->dateTime,
            ]);
        }

        return $existingActivity->save();
    }
}