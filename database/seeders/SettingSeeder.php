<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'title' => 'UMKM-BONE BOLANGO',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, laborum ad maxime expedita dolorum, nesciunt, eaque maiores quidem ea ipsa non! Laudantium saepe tempora nisi deserunt quos vel. Sed, praesentium.',
            'tentang' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium accusamus magnam porro odio! Error, magni veniam. Consequuntur magnam fuga aspernatur! Laborum recusandae maiores adipisci ipsum. Maxime ipsum assumenda nesciunt est?
            Excepturi reiciendis, tenetur totam laudantium voluptatibus doloribus consequatur quaerat facere deserunt aperiam blanditiis illum esse, exercitationem perferendis iure soluta, debitis inventore? Vitae asperiores ullam molestiae ea expedita accusantium, sequi aperiam.
            '
            
        ]);
    }
}
