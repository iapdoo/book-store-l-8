<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=[
        'category_name_ar',
        'category_name_en',
        'category_image',
        'category_description_ar',
        'category_description_en',
        'added_by',
    ];
    public function products(){
        return $this->hasMany('App\Models\Product','category_id','id');
    }

    public function Categories(){
        return $this->belongsTo('App\Models\User','added_by','id');
    }
}
