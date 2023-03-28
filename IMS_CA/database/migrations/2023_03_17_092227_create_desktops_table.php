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
        Schema::create('desktops', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('department');
            $table->string('user')->default('Not Assigned');
            $table->string('make');
            $table->string('cpu_serial_number');
            $table->string('monitor_serial_number');
            $table->string('operating_system');
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
        Schema::dropIfExists('desktops');
    }
};
