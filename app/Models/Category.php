<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model Category
 * 
 * Model ini merepresentasikan kategori dalam sistem.
 * 
 * Fitur:
 * 1. Kategorisasi tiket dan ide
 * 2. Pengelompokan konten
 * 3. Navigasi dan filter
 * 4. Relasi dengan model Ticket dan Idea
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sla_hours',
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
} 