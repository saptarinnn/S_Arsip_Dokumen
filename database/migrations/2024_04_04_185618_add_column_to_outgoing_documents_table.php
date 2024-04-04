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
        Schema::table('outgoing_documents', function (Blueprint $table) {
            $table->string('expedition', 20)->after('user_id');
            $table->string('receipt_number', 50)->after('expedition');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('outgoing_documents', function (Blueprint $table) {
            $table->dropColumn('receipt_number');
            $table->dropColumn('expedition');
        });
    }
};
