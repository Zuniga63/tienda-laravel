<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$tables = [
			"tag",
		];
		$this->truncate_tables($tables);
		$this->call(TagTableSeeder::class);
		// \App\Models\User::factory(10)->create();
	}

	protected function truncate_tables($tables){
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		foreach($tables as $table){
			DB::table($table)->truncate();
		}//end foreach
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}//end function
}//end method
