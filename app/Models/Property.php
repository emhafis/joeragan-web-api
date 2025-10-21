<?php

namespace App\Models;

use Illuminate\Support\Str;
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

  public function images()
  {
    return $this->hasMany(PropertyImage::class);
  }

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($property) {
      if (empty($property->slug)) {
        $property->slug = Str::slug($property->name);
      }
    });

    static::updating(function ($property) {
      if ($property->isDirty('name')) {
        $property->slug = Str::slug($property->name);
      }
    });
  }
}
