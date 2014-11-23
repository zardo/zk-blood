<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DonationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
            $number = $faker->randomNumber(5);
            if ($number % 3) {
                $donator = Donator::orderByRaw("RAND()")->first();
                Donation::create([
                    'queue' => 1,
                    'hemocenter_id' => 1,
                    'donator_id' => $donator->id
                ]);
            } else {
                Donation::create([
                    'queue' => 1,
                    'hemocenter_id' => 1,
                ]);
            }
		}
	}

}