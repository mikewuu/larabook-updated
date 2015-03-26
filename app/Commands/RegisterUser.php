<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class RegisterUser extends Command implements SelfHandling {

    protected $registrar;
    protected $request;
    protected $auth;

    use ValidatesRequests;


    /**
     * Create a new Repositories instance.
     *
     * @param Request $request
     * @param Registrar $registrar
     * @param Guard $auth
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the Repositories.
     *
     * @return void
     */
    public function handle(Registrar $registrar, Guard $auth)
    {
        // Create and Register User
        $auth->login($registrar->create($this->request->all()));

    }

}
