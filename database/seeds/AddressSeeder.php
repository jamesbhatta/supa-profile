<?php

use App\District;
use App\Province;
use App\Ward;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headers = ['PROVINCE', 'DISTRICT'];
        $tableContent = [];

        $this->command->getOutput()->progressStart(7);
        foreach (config('address.provinces') as $province) {

            //create province
            $newProvince = Province::firstOrCreate([
                'name' => $province['name'],
                'name_en' => $province['name_en']
            ]);

            foreach ($province['districts'] as $district) {
                //create district
                District::firstOrCreate([
                    'name' => Str::of($district['name'])->trim(),
                    'name_en' => Str::of($district['name_en'])->trim(),
                    'province_id' => $newProvince->id
                ]);


                $this->command->getOutput()->progressAdvance();
                array_push($tableContent, [$newProvince['name'], $district['name']]);
            }
        }

        // End progressbar
        $this->command->getOutput()->progressFinish();

        // Show table of provinces and districts
        $this->command->table($headers, $tableContent);

        $this->command->getOutput()->progressStart();
        // Create wards
        Ward::firstOrCreate(['name' => '१', 'name_en' => '1']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '२', 'name_en' => '2']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '३', 'name_en' => '3']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '४', 'name_en' => '4']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '५', 'name_en' => '5']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '६', 'name_en' => '5']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '७', 'name_en' => '7']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '८', 'name_en' => '8']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '९', 'name_en' => '9']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '१०', 'name_en' => '10']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '११', 'name_en' => '11']);
        $this->command->getOutput()->progressAdvance();
        Ward::firstOrCreate(['name' => '१२', 'name_en' => '12']);
        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();
    }
}
