<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name'];
 
    public function sizes()
{
    return $this->belongsToMany(Size::class)->withTimestamps();
}
}
