<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settlement;
use App\Http\Resources\AddressCollection;

class AddressController extends Controller
{
    public function getInfoByZipCode($code) 
    {     
        $localityName = '';
        $settlements = Settlement::with('municipality', 'locality', 'municipality.entity')->where('zip_code', $code)->get();

        if ($settlements->count() === 0) {
            return response()->json([], 400);
        }

        $settlementsArray = [];
        foreach($settlements as $key => $settlement) {

            $locality = [];
            if ($settlements[$key]->locality) {
                $locality = [
                    'key' => $settlements[$key]->locality->key,
                    'name' => $settlements[$key]->locality->name,
                ];

                if ($localityName == '') {
                    $localityName = $settlements[$key]->locality->name;
                }
            }

            $settlementsArray[] = [
                'key' => $settlement->key,
                'name' => $settlement->name,
                'zone_type' => $settlement->zone_type,
                'settlement_type' => [
                    'name' => $settlement->type
                ]
            ];
        }

        $response = [
            'zip_code' => $settlements[0]->zip_code,
            'locality' => $localityName,
            'federal_entity' => [
                "key" =>  $settlements->first()->municipality->first()->entity->key,
                "name" => $settlements->first()->municipality->first()->entity->name,
                "code" =>  null
            ],
            'settlements' => $settlementsArray,
            'municipality' => [
                'key' => $settlements->first()->municipality->first()->key,
                'name' => $settlements->first()->municipality->first()->name
            ]
        ];

        return response()->json($response, 200);
    }
}
