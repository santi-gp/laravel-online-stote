<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // The up method adds two columns to the users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('client');
            $table->integer('balance');
        });
    }

    public function down()
    {
        // The down method removes the role and balance columns
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role']);
            $table->dropColumn(['balance']);
        });
    }
};
