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
            $table->text('answer');
            $table->integer('value');

            $table->rememberToken();
            $table->timestamps();
            $table->integer('po_user_id');
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
