<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image',
        'description',
        'owner',
        'location',
        'email',
        'phone',
        'established',
        'employees',
        'needs',
        'reward',
        'milestones',
    ];

    protected $casts = [
        'milestones' => 'array',
    ];
}
