<?php

class ItemsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{
		DB::table('items')->delete();

		$items = array(
			array(
				'owner_id' => '1',
				'name' => 'Go to sleep',
				'done' => false
			),
			array(
				'owner_id' => '1',
				'name' => 'Walk the cats',
				'done' => false
			),
			array(
				'owner_id' => '1',
				'name' => 'Eat the dinner',
				'done' => false
			)
		);

		DB::table('items')->insert($items);

		// $this->call('UserTableSeeder');
	}

}
