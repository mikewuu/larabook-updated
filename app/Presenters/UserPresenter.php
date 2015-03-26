<?php namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    /**
     * Present user avatar
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        return "//www.gravatar.com/avatar/" . $this->email . "?s={$size}";
    }

    /**
     * Get the number of statuses for a given user
     * $user->present()->statusCount($user)
     * @param $user
     * @return string
     */
    public function statusCount()
    {
        $statusCount = $this->entity->statuses->count();
        $plural = str_plural('Status', $statusCount);
        return "{$statusCount} {$plural}";
    }

    /**
     * Get the number of followed for a user
     * $user->present()->followersCount($user)
     * @param $user
     * @return string
     */
    public function followersCount()
    {
        /*
         * You access the entity calling the presenter by using $this->entity
         * This means you don't have to pass in the object again when calling it.
         * You can refer to this by looking into the Presenter class.
         */

        $followerCount = $this->entity->followers()->count();
        $plural = str_plural('Follower' , $followerCount);
        return "{$followerCount} {$plural}";
    }


}