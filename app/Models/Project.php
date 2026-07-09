<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'type', 'price', 'location', 'developer',
        'description', 'features', 'image', 'images', 'size_sqft',
        'bedrooms', 'bathrooms', 'tenure', 'is_featured', 'is_active',
        'whatsapp_group_link', 'telegram_channel', 'registration_link',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'features' => 'array',
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        if ($this->price >= 1000) {
            return 'RM' . number_format($this->price / 1000, 0) . 'k';
        }
        return 'RM' . number_format($this->price);
    }

    public function getPriceRangeAttribute(): string
    {
        return 'RM' . number_format($this->price, 0);
    }

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}
