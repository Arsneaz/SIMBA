<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Balita extends Model
{
    use HasFactory;

    protected $fillable = [
        "wali_id",
        "nik",
        "name_balita",
        "gender",
        "date_of_birth",
    ];

    public function wali(): BelongsTo
    {
        return $this->belongsTo(Wali::class);
    }

    public function historis(): HasMany
    {
        return $this->hasMany(Histori::class);
    }

}

