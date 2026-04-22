<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('skills', 'color')) {
            return;
        }

        DB::table('skills')->update(['color' => '#ffffff']);

        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE skills MODIFY color VARCHAR(255) NULL DEFAULT '#ffffff'");
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('skills', 'color') && DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE skills MODIFY color VARCHAR(255) NULL');
        }
    }
};
