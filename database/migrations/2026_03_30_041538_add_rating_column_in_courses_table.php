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
        Schema::table('courses', function (Blueprint $table) {
            //
                $table->integer('enrolled_count')->default(0)->after('price');
                $table->float('rating')->default(0)->after('enrolled_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            //
            $table->dropColumn('enrolled_count');
            $table->dropColumn('rating');
        });
    }
};
