<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Mass assignable attributes
    protected $fillable = ['name', 'description'];
}
