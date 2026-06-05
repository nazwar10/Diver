<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandPillar extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'title',
        'description',
        'image_path',
        'order',
    ];

    protected $casts = [
        'number' => 'integer',
        'order' => 'integer',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
