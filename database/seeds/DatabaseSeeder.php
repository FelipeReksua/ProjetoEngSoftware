<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	foreach (range(1,10) as $index) {
	        DB::table('pessoas')->insert([
	            'first_name' => $faker->firstName,
		        'last_name' => $faker->lastName,
		        'email' => $faker->unique()->safeEmail,
		        'city' => $faker->city,
		        'state' => $faker->state,
		        'job_title' => $faker->jobTitle,
		        'employee' => Str::random(10),
		        'childrens' => mt_rand(0, 9),
		        'cpf' => '111.111.111-11',
		        'social_project' => 0,
		        'renda' => '1000.00',
		        'pontos' => mt_rand(5, 4000),
		        'contemplado' => 0
	        ]);
		}

		foreach (range(1,5) as $index) {
	        DB::table('users')->insert([
	            'name' => $faker->name,
		        'email' => $faker->unique()->safeEmail,
		        'email_verified_at' => now(),
		        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		        'remember_token' => Str::random(10),
	        ]);
		}
    }
}
