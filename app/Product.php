<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
