<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = [
        'user_id',
        'status_id',
        'body'
    ];

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
