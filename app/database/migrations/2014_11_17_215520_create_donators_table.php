<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donators', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('rg');
			$table->string('cpf');
			$table->string('mother_name');
			$table->string('address');
			$table->string('district');
			$table->string('city');
			$table->string('state');
			$table->date('birth_date');
			$table->string('blood_type');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donators');
	}

}
