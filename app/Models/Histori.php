<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Histori extends Model
{
    use HasFactory;

    protected $fillable = [
        "balita_id",
        "date_record",
        "weight_balita",
        "height_balita",
        "head_circumference",
        "arm_circumference",
        "type_immunization",
        "type_vitamins"
    ];

    /**
     * Get the balita that owns the Histori
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function balita(): BelongsTo
    {
        return $this->belongsTo(Balita::class);
    }

}
