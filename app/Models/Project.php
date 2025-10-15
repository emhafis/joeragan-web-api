<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'location',
        'description',
        'client_name',
        'featured_image'
    ];

    public function images() {
        return $this->hasMany(ProjectImage::class);
    }
}
