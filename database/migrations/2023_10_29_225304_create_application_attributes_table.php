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
        Schema::create('application_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('country_id');
            $table->string('attribute_name');
            $table->string('step_id');
            $table->string('attribute_type');
            $table->string('filter_coloumn');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_attributes');
    }
};
