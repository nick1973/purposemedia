<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Runners extends Model
{
    protected $fillable = [
        'id', 'forename', 'surname', 'dob', 'email',
    ];
}
