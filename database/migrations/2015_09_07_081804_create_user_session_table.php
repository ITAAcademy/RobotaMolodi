<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSessionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('po_user_session', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('rm_username');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
       Schema::drop('po_user_session');
	}

}
