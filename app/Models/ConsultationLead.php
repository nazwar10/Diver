<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'contact_name',
        'email',
        'phone',
        'website_url',
        'project_type',
        'budget_range',
        'timeline',
        'project_brief',
        'how_found',
        'status',
        'source_page',
    ];

    protected $casts = [
        'project_type' => 'array',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }
}
