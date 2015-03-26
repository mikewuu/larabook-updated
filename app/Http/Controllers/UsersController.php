<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

    /**
     * A list of all the registered users
     * @return $this
     */
    public function index()
    {
        // Laravel 5.0 Eloquent pagination out the box!
        $users = User::orderBy('name', 'asc')->Paginate(25);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show individual profile fetch
     * user using their ID
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        /*
         * Eager loading the user with statuses as an array and orders
         * the statuses by latest first.
         *
         * Eager Load Constraints
         */
        $user = User::with(['statuses' => function($query)
        {
            $query->latest();
        }])->findOrFail($id);


        return view('users.show', compact('user', $user));
    }

}
