<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_name_ar',
        'product_name_en',
        'product_image',
        'product_description_ar',
        'product_description_en',
        'product_price',
        'product_quantity',
        'product_total_price',
        'category_id',
    ];


    public function products()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'table_user_products', 'product_id', 'user_id');
    }
}
