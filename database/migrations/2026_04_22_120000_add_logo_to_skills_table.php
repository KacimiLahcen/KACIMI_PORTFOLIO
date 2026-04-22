<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            if (!Schema::hasColumn('skills', 'logo')) {
                $table->string('logo')->nullable()->after('name');
            }
        });

        if (Schema::hasColumn('skills', 'percent')) {
            if (DB::getDriverName() === 'mysql') {
                DB::statement('ALTER TABLE skills MODIFY percent INTEGER NULL');
            } elseif (DB::getDriverName() === 'pgsql') {
                DB::statement('ALTER TABLE skills ALTER COLUMN percent DROP NOT NULL');
            }
        }
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            if (Schema::hasColumn('skills', 'logo')) {
                $table->dropColumn('logo');
            }
        });
    }
};
