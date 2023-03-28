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
        Schema::create('printers', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('department');
            $table->string('make');
            $table->string('model');
            $table->string('serial_number');
            $table->string('tag_number');
            $table->string('ip_address');
            $table->string('mac_address');
            $table->string('purchase_year');
            $table->string('status');
            $table->string('remarks');
            $table->string('availability');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printers');
    }
};
