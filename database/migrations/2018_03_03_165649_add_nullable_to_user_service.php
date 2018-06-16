<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToUserService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('service')->nullable()->change();
            $table->text('access_token')->nullable()->change();
            $table->text('refresh_token')->nullable()->change();
            $table->string('uuid')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->string('service')->change();
            $table->text('access_token')->change();
            $table->text('refresh_token')->change();
            $table->string('uuid')->change();
        });
    }
}
