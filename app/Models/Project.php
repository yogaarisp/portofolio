<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'tags', 'gradient',
        'url', 'status', 'sort_order',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
