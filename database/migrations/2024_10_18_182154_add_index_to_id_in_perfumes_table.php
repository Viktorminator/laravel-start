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
        Schema::table('perfumes', function (Blueprint $table) {
            // Ensure that the id column has an index
            $table->index('resource_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfumes', function (Blueprint $table) {
            // Remove the index if rolling back the migration
            $table->dropIndex(['resource_id']);
        });
    }
};
