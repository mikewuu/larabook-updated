<?php namespace App\Repositories;

use App\Status;
use App\User;

class StatusRepository {

    /**
     * Gets all the statuses for a given user
     * @param User $user
     * @return mixed
     */
    public function getAllForUser(User $user)
    {
        return $user->statuses()->with('user')->latest()->get(); //order by('created_at', 'desc')
    }

    public function save(Status $status, $userId)
    {
        return User::find($userId)->statuses()->save($status);
    }

}

