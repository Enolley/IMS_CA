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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('firstname');
            $table->text('remarks');
            $table->string('device_type');
            $table->string('requesters_name');
            $table->string('department');
            $table->string('application_date');
            $table->string('return_date');
            $table->string('status');
            $table->string('checked_by')->default('In Progress');
            $table->string('assigned_by')->default('In Progress');
            $table->string('return_status')->default('In Progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
