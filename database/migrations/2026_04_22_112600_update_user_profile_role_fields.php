<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('users', 'degree') && ! Schema::hasColumn('users', 'role')) {
            DB::statement('ALTER TABLE users CHANGE degree role VARCHAR(255) NULL');
        }

        if (Schema::hasColumn('users', 'birth_day')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('birth_day');
            });
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('users', 'birth_day')) {
            Schema::table('users', function (Blueprint $table) {
                $table->date('birth_day')->nullable()->after('is_admin');
            });
        }

        if (Schema::hasColumn('users', 'role') && ! Schema::hasColumn('users', 'degree')) {
            DB::statement('ALTER TABLE users CHANGE role degree VARCHAR(255) NULL');
        }
    }
};
