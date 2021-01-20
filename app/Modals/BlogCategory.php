<?php

namespace App\Modals;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    // use SoftDeletes;

    protected $fillable=[
        'title',
        'slug',
        'parent_id',
        'description',

    ];
}
