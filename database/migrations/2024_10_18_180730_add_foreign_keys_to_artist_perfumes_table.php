<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('actor_perfumes', function (Blueprint $table) {
//            // Add foreign key constraints
//            $table->foreign('actor_id')
//                ->references('id')
//                ->on('actors')
//                ->onDelete('cascade');
//
//            $table->foreign('fragrance_id')
//                ->references('id')
//                ->on('perfumes')
//                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('actor_perfumes', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['actor_id']);
//            $table->dropForeign(['fragrance_id']);
        });
    }
};
