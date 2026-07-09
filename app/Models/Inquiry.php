<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    protected $fillable = [
        'project_id', 'name', 'phone', 'email', 'monthly_salary',
        'approval_status', 'message', 'appointment_date', 'status', 'notes',
        'budget', 'location', 'inquiry_type',
    ];

    protected $casts = [
        'monthly_salary' => 'decimal:2',
        'appointment_date' => 'datetime',
        'budget' => 'decimal:2',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeApproved($query)
    {
        return $query->where('approval_status', 'approved');
    }
}
