<?php

namespace App\Services;

use App\Actions\ActivityActions;
use App\Models\User;
use Modules\User\Models\Entities\UsersActivity;

class ActivityService extends ActivityActions
{
    /**
     * Tracking user activity when user
     * Already login or logout
     *
     * @param  \App\Models\User $user
     * @param  string $activity
     * @return void
     */
    public function generateUserActivity($user, string $activity): UsersActivity
    {
        $existingActivity = $this->checkDuplicateActivity($user, $activity);

        if (!$existingActivity) {
            return $this->createNewActivity($user, $activity);
        }

        return $this->updateActivity($existingActivity, $activity);
    }

    /**
     * Create new activity by specific user
     *
     * @param  \App\Models\User $user
     * @param  string $activity
     * @return void
     */
    public function createNewActivity($user, $activity): UsersActivity
    {
        return UsersActivity::create(
            $this->mergedActivity($user->id, $activity)
        );
    }

    /**
     * Update exsisting activity by specific user
     *
     * @param  \App\Models\User $user->activities $existingActivity
     * @param  string $activity
     * @return void
     */
    public function updateActivity($existingActivity, string $activity): User
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