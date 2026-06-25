<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'percentage',
        'direction',
        'description',
        'period',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getMetricAttribute(): string
    {
        return (string) $this->percentage;
    }

    public function getLabelAttribute(): string
    {
        return (string) $this->description;
    }
}
