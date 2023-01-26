<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helper\Helper;
use App\Models\Locality;
use App\Models\Municipality;
use DB;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Locality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $municipality = Municipality::all();

        $municipaly = [];
        foreach($municipality as $value) {
            $municipaly[$value['entities_key']][$value['key']] = $value['id'];
        }

        $ids = [];
        $entities = Helper::postalCode(1);
        foreach ($entities as $key => $record) {
            if (!empty($record['c_cve_ciudad']) && !in_array($record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'], $ids)) {
                Locality::create([
                    'key' => $record['c_cve_ciudad'],
                    'name' => strtoupper($record['d_ciudad']),
                    'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'];
            }
        }
        $entities = Helper::postalCode(2);
        foreach ($entities as $key => $record) {
            if (!empty($record['c_cve_ciudad']) && !in_array($record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'], $ids)) {
                Locality::create([
                    'key' => $record['c_cve_ciudad'],
                    'name' => strtoupper($record['d_ciudad']),
                    'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'];
            }
        }
        $entities = Helper::postalCode(3);
        foreach ($entities as $key => $record) {
            if (!empty($record['c_cve_ciudad']) && !in_array($record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'], $ids)) {
                Locality::create([
                    'key' => $record['c_cve_ciudad'],
                    'name' => strtoupper($record['d_ciudad']),
                    'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'];
            }
        }
        $entities = Helper::postalCode(4);
        foreach ($entities as $key => $record) {
            if (!empty($record['c_cve_ciudad']) && !in_array($record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'], $ids)) {
                Locality::create([
                    'key' => $record['c_cve_ciudad'],
                    'name' => strtoupper($record['d_ciudad']),
                    'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'];
            }
        }
        $entities = Helper::postalCode();
        foreach ($entities as $key => $record) {
            if (!empty($record['c_cve_ciudad']) && !in_array($record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'], $ids)) {
                Locality::create([
                    'key' => $record['c_cve_ciudad'],
                    'name' => strtoupper($record['d_ciudad']),
                    'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio']."_".$record['c_cve_ciudad'];
            }
        }
    }
}
