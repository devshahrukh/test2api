<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 */
class Task extends Model
{
    protected $fillable = [
        'title',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
