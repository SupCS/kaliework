<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'long_description', 'ingridients', 'height', 'weight'];

    public function image()
    {
        return $this->hasOne(Image::class, 'product_id');
    }
    public function collections()
    {
        return $this->belongsToMany(Collection::class)->withTimestamps();
    }

    public function types()
    {
        return $this->belongsToMany(Type::class)->withTimestamps();
    }

    public function aromas()
    {
        return $this->belongsToMany(Aroma::class)->withTimestamps();
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withTimestamps();
    }

    public function wicks()
    {
        return $this->belongsToMany(Wick::class)->withTimestamps();
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }

}