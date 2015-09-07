<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('po_answers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('testNumber');
            $table->integer('answer');
            //$table->string('organisation');
            $table->integer('value');

            $table->rememberToken();
            $table->timestamps();
            $table->integer('rm_user_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('po_answers');
	}

}
