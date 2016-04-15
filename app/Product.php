<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
      return $this->hasMany(Features::class);
    }
}
