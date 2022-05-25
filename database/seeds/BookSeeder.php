<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake  = Faker\Factory::create();
        $limit = 50;

        for ($i = 0; $i < $limit; $i++){
            DB::table('book2s')->insert([
                'tenSach' => $fake->name,
                'tacGia' => $fake->name,
                'categories_id' => $fake->randomLetter,
                'soLuong' => $fake->numerify($string = '##'),
                'soTrang' => $fake->numerify($string = '##'),
                'ngayXB' => $fake->date("Y-m-d"),
                'moTa' => $fake->sentence(10)
            ]);
        }
    }
}
