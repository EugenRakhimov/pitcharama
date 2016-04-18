<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name','feature_body', 'content', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
