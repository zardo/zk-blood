<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class HemocentersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 1) as $index)
		{
			Hemocenter::create([
                'name' => 'Hemocentro de Santa Maria'
			]);
		}
	}

}