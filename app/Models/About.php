<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'status',
        'sort_order',
    ];
}

