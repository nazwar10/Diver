<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'client_name',
        'year',
        'tagline',
        'timeline',
        'description',
        'challenge',
        'solution',
        'thumbnail_path',
        'hero_image_path',
        'gallery_images',
        'services_used',
        'video_url',
        'video_poster',
        'is_featured',
        'order',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'services_used' => 'array',
        'year' => 'integer',
    ];

    public function results(): HasMany
    {
        return $this->hasMany(ProjectResult::class)->orderBy('order');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'project_service');
    }

    public function sectors(): BelongsToMany
    {
        return $this->belongsToMany(IndustrySector::class, 'project_sector');
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getServiceAttribute(): string
    {
        return $this->services->pluck('name')->implode(', ');
    }

    public function getSectorAttribute(): string
    {
        return $this->sectors->pluck('name')->implode(', ');
    }
}
