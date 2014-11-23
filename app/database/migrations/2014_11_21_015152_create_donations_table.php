<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('donator_id')->nullable();
			$table->integer('hemocenter_id');
	        $table->integer('queue');
	        $table->integer('height')->nullable();
	        $table->integer('weight')->nullable();
	        $table->integer('bpm')->nullable();
	        $table->integer('blood_pressure_1')->nullable();
	        $table->integer('blood_pressure_2')->nullable();
	        $table->integer('temperature')->nullable();
	        $table->boolean('used_drugs')->nullable();
	        $table->boolean('sex_with_more_than_3_partners')->nullable();
	        $table->boolean('had_surgery')->nullable();
	        $table->float('collected_volume')->nullable();
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
		Schema::drop('donations');
	}

}
