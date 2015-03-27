<?php namespace App\Http\Controllers;

use App\Commands\PublishStatusCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PublishStatusRequest;
// use App\Repositories\StatusRepository;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class StatusController extends Controller {


    public function index(Status $status)
    {
        if(Auth::check())
        {
            $userIds = Auth::user()->followedUsers()->lists('followed_id');
            $userIds[] = Auth::user()->id;

            // WhereIn to find where a column's value equals the value in an array
            $statuses = $status->whereIn('user_id', $userIds)->latest()->get();
        }
        else
        {
            $statuses = $status->all();
        }


        return view('statuses.index')->with('statuses', $statuses);
    }

    public function store(PublishStatusRequest $request)
    {
        $this->dispatch(new PublishStatusCommand($request->all()));

        Flash::info('Your status has been updated');

        // Redirects back to the page that submitted the form
        return Redirect::back();
    }

}
