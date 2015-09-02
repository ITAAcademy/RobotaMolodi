<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('filterVacancies', function(Blueprint $table)
        {

            $table->string('position');
            $table->integer('company_id');
            $table->string('branch');
            //$table->string('organisation');
            $table->date('date_field');
            $table->integer('salary');
            //$table->string('city');
            $table->mediumText('description');
            $table->string('user_email');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('filterVacancies');
	}

}
