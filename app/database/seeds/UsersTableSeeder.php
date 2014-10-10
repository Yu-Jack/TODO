<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{
		DB::table('users')->delete();

		$users = array(
			array(
				'name' => 'Jack',
				'password' => Hash::make('Jack'),
				'email' => 'example@example.com'
			)
		);

		DB::table('users')->insert($users);

		// $this->call('UserTableSeeder');
	}

}
