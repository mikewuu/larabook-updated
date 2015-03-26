<?php

namespace App\Traits;


trait FollowableTrait {


    /**
     * Get the list of users the current user follows
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followedUsers()
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    /**
     * Get the list of users following the current user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        // Same as followedUsers but with columns follower_id and followed_id reversed in order.
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }

    /**
     * Determine if given user is the currently logged in user
     * pass in the user object.
     *
     * @param $currentUser
     * @return bool
     */
    public function is($currentUser)
    {
        if ($this->id == $currentUser->id)
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function isFollowedBy($currentUser)
    {
        // Method 1 - Looping through each user

        // Loop through each user, the logged in user is following
        // Check if the name of the page
        //        foreach ($currentUser->follows as $following)
        //        {
        //            if ($this->name == $following->name)
        //            {
        //               return true;
        //                break;
        //            }
        //        }

        // Method 2 - Checking an array containing followed_id for the logged in user

        // Turns followed_id in into array
        $followingIds = $currentUser->followedUsers()->lists('followed_id');

        // Check if a value is in array
        return in_array($this->id, $followingIds);
    }
}