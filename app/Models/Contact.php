<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table='contacts';
    protected $fillable=[
        'contact_id',
        'contact_name',
        'contact_email',
        'contact_subject',
        'contact_massage',
        'view',
    ];
    public function contacts(){
        return $this->belongsTo('App\Models\Users','contact_id','id');
    }
}
