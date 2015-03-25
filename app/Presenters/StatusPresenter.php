<?php namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter {

    /**
     * Display how long it's been seen published
     * date.
     *
     * @return mixed
     */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }



}