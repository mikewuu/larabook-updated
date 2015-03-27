<?php namespace App\Http\Controllers;

use App\Commands\LeaveCommentOnStatusCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller {

    /**
     *Leave a new comment.
     * @param Request $request
     */
    public function store(Request $request)
    {

        // Helper function array_add() adds a key/value pair to an existing array
        // array_add(array, key(string), value(string))

            // fetch the input
            $input = array_add($request->all(), 'user_id', Auth::user()->id);

        // execute a command to leave a comment on a status
        $this->dispatch(new LeaveCommentOnStatusCommand($input));

        // go back
        return Redirect::back();
    }

}
