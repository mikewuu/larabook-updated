<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Status extends Model {

    use PresentableTrait;

	protected $fillable = [
        'body',
        'user_id',
    ];

    protected $presenter = 'App\Presenters\StatusPresenter';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
