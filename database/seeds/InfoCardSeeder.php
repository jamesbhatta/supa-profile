<?php

use App\InfoCard;
use Illuminate\Database\Seeder;

class InfoCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfoCard::create([
            'label' => 'क्षेत्रफल',
            'value' => '19,539',
            'icon' => 'far fa-map',
            'link' => '/geographical-political-situation',
            'card_theme' => 'blue-color'
        ]);

        InfoCard::create([
            'label' => 'जम्मा जिल्ला',
            'value' => '9',
            'icon' => 'fa fa-globe',
            'card_theme' => 'green-color'
        ]);

        InfoCard::create([
            'label' => 'जनसंख्या',
            'value' => '27,11,270',
            'icon' => 'fa fa-users',
            'card_theme' => 'indigo-color'
        ]);

        InfoCard::create([
            'label' => 'जनघनत्तो (वर्ग कि.मि.)',
            'value' => '131',
            'icon' => 'fa fa-users',
            'card_theme' => 'orange-color'
        ]);

        InfoCard::create([
            'label' => 'प्रदेशसभा निर्वाचन क्षेत्र',
            'value' => '32',
            'icon' => 'fa fa-person-booth',
            'card_theme' => 'yellow-color'
        ]);

        InfoCard::create([
            'label' => 'प्रतिनिधि निर्वाचन क्षेत्र',
            'value' => '16',
            'icon' => 'fa fa-person-booth',
            'card_theme' => 'teal-color'
        ]);
    }
}
