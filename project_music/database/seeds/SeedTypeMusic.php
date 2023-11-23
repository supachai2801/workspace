<?php

use App\TypeMusic;
use Illuminate\Database\Seeder;

class SeedTypeMusic extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs  = [
            ['name' => 'เพลงบรรเลง', 'active' => 1],
            ['name' => 'คลาสสิก', 'active' => 1],
            ['name' => 'ป๊อป', 'active' => 1],
            ['name' => 'แจ๊ส', 'active' => 1],
            ['name' => 'ริทึมแอนด์บลูส์', 'active' => 1],
            ['name' => 'แร็พ', 'active' => 1],
            ['name' => 'ฮิปฮอป', 'active' => 1],
            ['name' => 'ร็อก', 'active' => 1],
            ['name' => 'อิเล็กทรอนิกส์', 'active' => 1],
            ['name' => 'เทคโน', 'active' => 1],
            ['name' => 'อะแคปเปลลา', 'active' => 1],
            ['name' => 'ลูกทุ่ง', 'active' => 1],
            ['name' => 'วาไรตี้', 'active' => 1],
        ];
        $model = new TypeMusic();
        $model->insert($inputs);
    }
}
