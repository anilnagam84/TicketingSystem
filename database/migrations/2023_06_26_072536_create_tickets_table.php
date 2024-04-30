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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['open', 'escalated', 'resolved', 'rejected'])->default('open');
            $table->enum('category', ['Technical Issues', 'Feature Requests', 'Installation and Setup', 'User Guidance', 'Account and Licensing', 'Security and Privacy', 'Integration and API', 'Performance Optimization']);
            $table->enum('priority', ['high', 'medium', 'low']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_changed_by_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
