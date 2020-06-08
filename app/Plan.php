<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name'];

    public function plandetail()
    {
        return $this->hasMany(Product::class);
    }
}
