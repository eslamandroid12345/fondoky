<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = [

        'name_ar',
        'name_en',
        'logo',
        'about_ar',
        'about_en',
        'privacy_ar',
        'privacy_en',
        'location_ar',
        'location_en',
    ];
}
