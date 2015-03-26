<?php namespace App\Http\Controllers;

use App\Commands\PublishStatusCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PublishStatusRequest;
// use App\Repositories\StatusRepository;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class StatusController extends Controller {


    public function index(/*StatusRepository $statusRepo*/)
    {

        // return $statusRepo->getAllForUser(Auth::user());

        $statuses = Status::all()->sortByDesc('created_at');
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
