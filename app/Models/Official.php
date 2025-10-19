<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    // Which fields are mass-assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'phone',
        'email',
        'responsibilities',
        'photo',
    ];

    // Helper attribute: full_name
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Relation: an official may have many services (we'll define Service later)
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
