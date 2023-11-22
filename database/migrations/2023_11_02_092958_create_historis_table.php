<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balita_id')->constrained('balitas')->cascadeOnDelete();
            $table->date('date_record');
            $table->char('weight_balita');
            $table->char('height_balita');
            $table->char('head_circumference');
            $table->char('arm_circumference');
            $table->char('type_immunization');
            $table->char('type_vitamins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historis');
    }
};
