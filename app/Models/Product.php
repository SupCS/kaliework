<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price'];

    public function image()
    {
        return $this->hasOne(Image::class, 'product_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class)->withTimestamps();
    }

    public function sizes()
{
    return $this->belongsToMany(Size::class)->withTimestamps();
}
}

