<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
  protected $fillable = [
    'name',
    //'slug',
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

  protected static function booted()
  {
    // Saat membuat property baru
    static::creating(function ($property) {
      $property->slug = self::generateUniqueSlug($property->name);
    });

    // Saat mengupdate property
    static::updating(function ($property) {
      if ($property->isDirty('name')) {
        $property->slug = self::generateUniqueSlug($property->name, $property->id);
      }
    });
  }

  /**
   * Generate slug unik berdasarkan nama property.
   */
  protected static function generateUniqueSlug($name, $ignoreId = null)
  {
    $slug = Str::slug($name);
    $originalSlug = $slug;
    $count = 2;

    // Pastikan slug unik
    while (
      Property::where('slug', $slug)
      ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
      ->exists()
    ) {
      $slug = "{$originalSlug}-{$count}";
      $count++;
    }

    return $slug;
  }

  public function scopeAvailableFirst($query)
  {
    return $query->orderByRaw("
        CASE 
            WHEN status = 'available' THEN 1 
            ELSE 2 
        END
    ");
  }
}
