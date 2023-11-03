<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wali extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name_parent',
        'address',
        'date_of_birth',
        'phone_number'
    ];

    /**
     * Get all of the wali for the Wali
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function balitas(): HasMany
    {
        return $this->hasMany(Balita::class);
    }
}

