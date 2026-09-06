<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olympiad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'country',
        'level',
        'date',
        'cost',
        'icon',
    ];
}
