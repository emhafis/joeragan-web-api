<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
  protected $fillable = [
    'name',
    'slug',
    'category',
    'address',
    'land_area',
    'description',
    'type',
    'price',
    'facilities',
    'remaining_units',
    'status',
    'featured_image',
  ];

  protected $casts = [
    'facilities' => 'array',
  ];

  public function images() {
    return $this->hasMany(PropertyImage::class);
  }
}
