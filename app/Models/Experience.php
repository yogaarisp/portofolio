<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'title', 'company', 'period', 'description',
        'responsibilities', 'dot_color', 'badge_type',
        'is_current', 'is_leadership', 'sort_order',
    ];

    protected $casts = [
        'responsibilities' => 'array',
        'is_current' => 'boolean',
        'is_leadership' => 'boolean',
    ];
}
