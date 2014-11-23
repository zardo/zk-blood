<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DonatorsTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

		$faker = Faker::create('pt_BR');

		foreach(range(1, 100) as $index)
		{
			Donator::create([
                'name' => $faker->name,
                'rg' => $faker->randomNumber(8),
                'cpf' => $faker->randomNumber(8),
                'mother_name' => $faker->name('female'),
                'address' => $faker->streetAddress,
                'district' => $faker->streetName,
                'city' => $faker->city,
                'state' => $faker->state,
                'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'blood_type' => $faker->randomElement(array('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-')),
			]);
		}
	}

}