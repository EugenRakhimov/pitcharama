<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','category','image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function features()
    {
      return $this->hasMany(Feature::class);
    }
}
