<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class Admin extends Model implements AuthenticatableContract {

    use Authenticatable;

    protected $table='admins';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function contacts(){
        return $this->hasMany('App\Models\Contact','contact_id','id');
    }
}
