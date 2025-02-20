<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    protected $table = 'api_keys'; // Explicit table name (if different)

    protected $fillable = [
        'api_key',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope to filter only active API keys
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
