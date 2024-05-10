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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('last_name')->after('first_name');
            $table->string('email')->after('last_name');
            $table->string('position')->after('email');
            $table->string('address')->after('position');
            $table->json('workData')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('email');
            $table->dropColumn('position');
            $table->dropColumn('address');
            $table->dropColumn('workData');
        });
    }
};
