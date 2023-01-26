<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helper\Helper;
use App\Models\Settlement;
use App\Models\Municipality;
use App\Models\Locality;
use DB;

class SettlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Settlement::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $municipality = Municipality::all();

        $municipaly = [];
        foreach($municipality as $value) {
            $municipaly[$value['entities_key']][$value['key']] = $value['id'];
        }

        $Locality = Locality::all();

        $Localy = [];
        foreach($Locality as $value) {
            $Localy[$value['municipalities_id']][$value['key']] = $value['id'];
        }

        $entities = Helper::postalCode(1);
        foreach ($entities as $key => $record) {
            print strtoupper(Helper::stripAccents($record['d_asenta'])) . PHP_EOL;
            Settlement::create([
                'key' => intval($record['id_asenta_cpcons']),
                'zip_code' => $record['d_codigo'],
                'name' => strtoupper(Helper::stripAccents($record['d_asenta'])),
                'zone_type' => strtoupper($record['d_zona']),
                'type' => Helper::stripAccents($record['d_tipo_asenta']) ?? '',
                'entities_key' => $record['c_estado'],
                'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                'localities_id' => empty($Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']]) ? 0 : $Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']],
            ]);
        }
        $entities = Helper::postalCode(2);
        foreach ($entities as $key => $record) {
            print strtoupper(Helper::stripAccents($record['d_asenta'])) . PHP_EOL;
            Settlement::create([
                'key' => intval($record['id_asenta_cpcons']),
                'zip_code' => $record['d_codigo'],
                'name' => strtoupper(Helper::stripAccents($record['d_asenta'])),
                'zone_type' => strtoupper($record['d_zona']),
                'type' => Helper::stripAccents($record['d_tipo_asenta']) ?? '',
                'entities_key' => $record['c_estado'],
                'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                'localities_id' => empty($Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']]) ? 0 : $Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']],
            ]);
        }
        $entities = Helper::postalCode(3);
        foreach ($entities as $key => $record) {
            print strtoupper(Helper::stripAccents($record['d_asenta'])) . PHP_EOL;
            Settlement::create([
                'key' => intval($record['id_asenta_cpcons']),
                'zip_code' => $record['d_codigo'],
                'name' => strtoupper(Helper::stripAccents($record['d_asenta'])),
                'zone_type' => strtoupper($record['d_zona']),
                'type' => Helper::stripAccents($record['d_tipo_asenta']) ?? '',
                'entities_key' => $record['c_estado'],
                'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                'localities_id' => empty($Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']]) ? 0 : $Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']],
            ]);
        }
        $entities = Helper::postalCode(4);
        foreach ($entities as $key => $record) {
            print strtoupper(Helper::stripAccents($record['d_asenta'])) . PHP_EOL;
            Settlement::create([
                'key' => intval($record['id_asenta_cpcons']),
                'zip_code' => $record['d_codigo'],
                'name' => strtoupper(Helper::stripAccents($record['d_asenta'])),
                'zone_type' => strtoupper($record['d_zona']),
                'type' => Helper::stripAccents($record['d_tipo_asenta']) ?? '',
                'entities_key' => $record['c_estado'],
                'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                'localities_id' => empty($Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']]) ? 0 : $Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']],
            ]);
        }
        $entities = Helper::postalCode();
        foreach ($entities as $key => $record) {
            print strtoupper(Helper::stripAccents($record['d_asenta'])) . PHP_EOL;
            Settlement::create([
                'key' => intval($record['id_asenta_cpcons']),
                'zip_code' => $record['d_codigo'],
                'name' => strtoupper(Helper::stripAccents($record['d_asenta'])),
                'zone_type' => strtoupper($record['d_zona']),
                'type' => Helper::stripAccents($record['d_tipo_asenta']) ?? '',
                'entities_key' => $record['c_estado'],
                'municipalities_id' => $municipaly[$record['c_estado']][$record['c_mnpio']],
                'localities_id' => empty($Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']]) ? 0 : $Localy[$municipaly[$record['c_estado']][$record['c_mnpio']]][$record['c_cve_ciudad']],
            ]);
        }
    }
}
