<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        settings()->set([
            'app_name' => 'व्यवसाय सिफारिस',
            'app_name_en' => 'Supa Profile'
        ]);
    }
}
