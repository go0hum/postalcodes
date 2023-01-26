<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helper\Helper;
use App\Models\Municipality;
use DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Municipality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $ids = [];
        $entities = Helper::postalCode(1);
        foreach ($entities as $key => $record) {
            if (!in_array($record['c_estado']."_".$record['c_mnpio'], $ids)) {
                Municipality::create([
                    'key' => intval($record['c_mnpio']),
                    'name' => strtoupper(Helper::stripAccents($record['D_mnpio'])),
                    'entities_key' => $record['c_estado'],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio'];
            }
        }
        $entities = Helper::postalCode(2);
        foreach ($entities as $key => $record) {
            if (!in_array($record['c_estado']."_".$record['c_mnpio'], $ids)) {
                Municipality::create([
                    'key' => intval($record['c_mnpio']),
                    'name' => strtoupper(Helper::stripAccents($record['D_mnpio'])),
                    'entities_key' => $record['c_estado'],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio'];
            }
        }
        $entities = Helper::postalCode(3);
        foreach ($entities as $key => $record) {
            if (!in_array($record['c_estado']."_".$record['c_mnpio'], $ids)) {
                Municipality::create([
                    'key' => intval($record['c_mnpio']),
                    'name' => strtoupper(Helper::stripAccents($record['D_mnpio'])),
                    'entities_key' => $record['c_estado'],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio'];
            }
        }
        $entities = Helper::postalCode(4);
        foreach ($entities as $key => $record) {
            if (!in_array($record['c_estado']."_".$record['c_mnpio'], $ids)) {
                Municipality::create([
                    'key' => intval($record['c_mnpio']),
                    'name' => strtoupper(Helper::stripAccents($record['D_mnpio'])),
                    'entities_key' => $record['c_estado'],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio'];
            }
        }
        $entities = Helper::postalCode();
        foreach ($entities as $key => $record) {
            if (!in_array($record['c_estado']."_".$record['c_mnpio'], $ids)) {
                Municipality::create([
                    'key' => intval($record['c_mnpio']),
                    'name' => strtoupper(Helper::stripAccents($record['D_mnpio'])),
                    'entities_key' => $record['c_estado'],
                ]);
                $ids[] = $record['c_estado']."_".$record['c_mnpio'];
            }
        }
    }
}
