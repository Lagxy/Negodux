<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'photo',
        'expertise',
        'years_experience',
        'email',
        'about',
        'education',
        'areas_of_expertise',
        'achievements',
        'portfolio',
    ];

    protected $casts = [
        'areas_of_expertise' => 'array',
        'achievements' => 'array',
        'portfolio' => 'array',
    ];
}
