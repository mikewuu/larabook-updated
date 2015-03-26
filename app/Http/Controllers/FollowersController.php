<?php namespace App\Http\Controllers;

use App\Commands\FollowUserCommand;
use App\Commands\UnfollowUserCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class FollowersController extends Controller {

    /**
     * Follow a user
     * @param Request $request
     * @return string
     */
    public function store(Request $request, User $user)
    {
        // id of user to follow
        $userIdToFollow = $request['userIdToFollow'];
        // id of authenticated use
        $userId = Auth::user()->id;

        $this->dispatch(new FollowUserCommand($userId, $userIdToFollow));

        Flash::success('You are now following ' . $user->find($userIdToFollow)->name);

        return Redirect::back();
    }

    /**
     * Destroy a use
     */
    public function destroy($idOfUserToUnfollow, User $user)
    {
        // Method 1 - In Controller
        // Auth::user()->follows()->detach($idOfUserToUnfollow);

        // Method 2 - Using a Command
        $this->dispatch(new UnfollowUserCommand($idOfUserToUnfollow));

        Flash::error('You have stopped following ' . $user->find($idOfUserToUnfollow)->name);

        return Redirect::back();

    }
}
