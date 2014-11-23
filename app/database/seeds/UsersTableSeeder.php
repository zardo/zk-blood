<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
            'email' => 'lucas@deliverymuch.com.br',
            'hemocenter_id' => 1,
            'type' => 'reception',
            'password' => Hash::make('lucas01')
        ]);

        User::create([
            'email' => 'rafael@deliverymuch.com.br',
            'hemocenter_id' => 1,
            'type' => 'prescreening',
            'password' => Hash::make('rafael01')
        ]);

        User::create([
            'email' => 'fernando@deliverymuch.com.br',
            'hemocenter_id' => 1,
            'type' => 'screening',
            'password' => Hash::make('fernando01')
        ]);

        User::create([
            'email' => 'guilherme@deliverymuch.com.br',
            'hemocenter_id' => 1,
            'type' => 'collection',
            'password' => Hash::make('guilherme01')
		]);
	}

}