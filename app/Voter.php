<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $table = 'voters';
    protected $guarded = ['show'];

    public function Voter()
    {
        return $this->belongsTo('App\User');
    }
}
