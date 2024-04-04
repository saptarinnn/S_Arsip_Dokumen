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
        Schema::create('outgoing_documents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('document_code', 10)->unique();
            $table->date('date_out');
            $table->foreignUuid('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('file', 150);
            $table->foreignUuid('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_documents');
    }
};
