<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_Us extends Model
{
    use HasFactory;
    protected $table='about__us';
    protected $fillable=[

        'siteName',
        'sitDescription',
        'sitImage',
        'facebook',
        'tweeter',
        'linkin',
        'phone',
        'email',
        'address',


    ];
}
