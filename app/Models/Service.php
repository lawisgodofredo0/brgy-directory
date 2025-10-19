<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'official_id',
        'office_hours',
    ];

    // Service belongs to an official (may be null)
    public function official()
    {
        return $this->belongsTo(Official::class);
    }
}
