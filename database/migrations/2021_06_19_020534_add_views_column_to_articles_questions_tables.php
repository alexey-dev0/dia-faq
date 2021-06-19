<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewsColumnToArticlesQuestionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('views')->default('0')->after('rating');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('views')->default('0')->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['views']);
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn(['views']);
        });
    }
}
