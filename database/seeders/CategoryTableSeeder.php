<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$catgories = [
			["1", "null", "Accesorios", "1"],
				["2", "1", "Relojes", "2"],
					["3", "2", "Relojes analogos", "3"],
					["4", "2", "Relojes digitales", "3"],
					["5", "1", "Canguros", "1"],
					["6", "1", "Billeteras", "1"],
						["7", "6", "Billeteras en cuero", "3"],
						["8", "6", "Billeteras sinteticas", "3"],
					["9", "1", "Joyería", "2"],
						["10", "9", "Joyería en acero", "3"],
						["11", "9", "Joyería en plata", "3"],
						["12", "9", "Joyería en otro material", "3"],
					["13", "1", "Bolsos", "2"],
					["14", "1", "Otros", "2"],
				["15", "null", "Morrales", "1"],
					["16", "15", "Morrales escolares", "2"],
					["17", "15", "Morrales universitarios", "2"],
					["18", "15", "Maletas", "2"],
					["19", "15", "Tulas", "2"],
				["20", "null", "Ropa", "1"],
					["21", "20", "Jeans", "2"],
					["22", "20", "Camisetas", "2"],
					["23", "20", "Camisas", "2"],
					["24", "20", "Blusas", "2"],
					["25", "20", "Bermudas", "2"],
		];

		foreach($catgories as $key=>$value){
			if("null" === $value[1]){
				DB::table('category')->insert([
					'id' => $value[0],
					'name' => $value[2],
					'rank' => $value[3],
				]);
			}else{
				DB::table('category')->insert([
					'id' => $value[0],
					'main_id' => $value[1],
					'name' => $value[2],
					'rank' => $value[3],
				]);
			}
		}
	}
}
