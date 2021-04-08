<?php

namespace App\Permission\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //es: desde aqui
    //en: from here

    protected $fillable = [
        'name', 'slug', 'description','full-access',
    ];
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    public function permissions(){
        return $this->belongsToMany('App\Permission\Models\Permission')->withTimestamps();
    }
}
