<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['comment_body'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
