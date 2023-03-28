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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('user_id');
            $table->string('department');
            $table->string('device_type');
            $table->string('application_date');
            $table->string('return_date');
            $table->text('justification');
            $table->string('status')->default('In Progress');
            $table->string('recommended_by')->default('In Progress');
            $table->text('recommend_remarks')->default('In Progress');
            $table->string('checked_by')->default('In Progress');
            $table->text('check_remarks')->default('In Progress');
            $table->string('assigned_to')->default('In Progress');
            $table->string('assigned_by')->default('In Progress');
            $table->string('return_status')->default('In Progress');
            $table->text('return_remarks')->default('In Progress');
            $table->string('feedback_by')->default('Not Applicable');
            $table->text('reject_feedback')->default('Not Applicable');
            $table->string('returned_to')->default('In Progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
