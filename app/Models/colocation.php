<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class colocation extends Model
{
 protected $table = 'colocation';

    protected $fillable = ['name'];
 public function users()
    {
       return $this->belongsToMany(User::class,'memberchip');
    }
}

