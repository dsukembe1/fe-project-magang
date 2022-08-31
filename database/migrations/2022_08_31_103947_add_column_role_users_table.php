<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')){
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users','role')){
                    $table->string('role')->default(0)->after('email');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('users')){
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users','role')){
                    $table->dropColumn('role');
                }
            });
        }
    }
}