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
        Schema::create('missingdesktopfeedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('desktop_id');
            $table->string('user');
            $table->text('feedback');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missingdesktopfeedbacks');
    }
};
