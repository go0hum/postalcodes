<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helper\Helper;
use App\Models\Entity;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entity::query()->delete();
        $ids = [];
        $entities = Helper::postalCode(1);
        foreach ($entities as $key => $record) {
            if (!in_array(intval($record['c_estado']), $ids)) {
                Entity::create([
                    'key' => $record['c_estado'],
                    'name' => strtoupper($record['d_estado']),
                ]);
                $ids[] = $record['c_estado'];
            }
        }
        $entities = Helper::postalCode(2);
        foreach ($entities as $key => $record) {
            if (!in_array(intval($record['c_estado']), $ids)) {
                Entity::create([
                    'key' => $record['c_estado'],
                    'name' => strtoupper($record['d_estado']),
                ]);
                $ids[] = $record['c_estado'];
            }
        }
        $entities = Helper::postalCode(3);
        foreach ($entities as $key => $record) {
            if (!in_array(intval($record['c_estado']), $ids)) {
                Entity::create([
                    'key' => $record['c_estado'],
                    'name' => strtoupper($record['d_estado']),
                ]);
                $ids[] = $record['c_estado'];
            }
        }
        $entities = Helper::postalCode(4);
        foreach ($entities as $key => $record) {
            if (!in_array(intval($record['c_estado']), $ids)) {
                Entity::create([
                    'key' => $record['c_estado'],
                    'name' => strtoupper($record['d_estado']),
                ]);
                $ids[] = $record['c_estado'];
            }
        }
        $entities = Helper::postalCode();
        foreach ($entities as $key => $record) {
            if (!in_array(intval($record['c_estado']), $ids)) {
                Entity::create([
                    'key' => $record['c_estado'],
                    'name' => strtoupper($record['d_estado']),
                ]);
                $ids[] = $record['c_estado'];
            }
        }
    }
}
