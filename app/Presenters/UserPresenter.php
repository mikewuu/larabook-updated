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



}