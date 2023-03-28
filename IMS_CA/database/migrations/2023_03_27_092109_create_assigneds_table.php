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
        Schema::create('assigneds', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('firstname');
            $table->text('remarks');
            $table->string('device_type');
            $table->string('requesters_name');
            $table->string('department');
            $table->string('device_serial_number');
            $table->string('additional_serial_number');
            $table->string('application_date');
            $table->string('return_date');
            $table->string('status');
            $table->string('recommended_by');
            $table->string('assigned_by');
            $table->string('return_status')->default('In Progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigneds');
    }
};
