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
    public function __construct(Request $request, Registrar $registrar, Guard $auth)
    {
        $this->request = $request;
        $this->registrar = $registrar;
        $this->auth= $auth;
    }

    /**
     * Execute the Repositories.
     *
     * @return void
     */
    public function handle()
    {

        // Create and Register User
        $this->auth->login($this->registrar->create($this->request->all()));

    }

}
