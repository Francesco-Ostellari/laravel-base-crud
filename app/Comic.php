<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'title',
        'authors',
        'price',
        'genre',
        'description',
        'photo'
    ];
}
