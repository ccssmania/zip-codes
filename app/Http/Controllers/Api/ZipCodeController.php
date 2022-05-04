<?php

namespace App\Http\Controllers\Api;

use App\Models\ZipCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    /**
     * Get zip code
     */
    public function getZipCode(ZipCode $zipCode)
    {
        $settlements = $zipCode->settlements;

        $settlementsReamed = collect();
        foreach ($settlements as $settlement) {
            $aux = [];
            $aux['key'] = $settlement->key;
            $aux['name'] = $settlement->name;
            $aux['zone_type'] = $settlement->zone_type;
            $aux['settlement_type'] = ['name' => $settlement->settlementType->name];

            $settlementsReamed->push($aux);
        }
        $federalEntity = [
            'key' => $zipCode->federalEntity->id,
            'name' => $zipCode->federalEntity->name,
            'code' => $zipCode->federalEntity->code,
        ];

        $municipality = [
            'key' => $zipCode->municipality->id,
            'name' => utf8_encode($zipCode->municipality->name),
        ];
        $payload = [
            'zip_code' => $zipCode->id,
            'locality' => $zipCode->locality,
            'federal_entity' => $federalEntity,
            'settlements' => $settlementsReamed,
            'municipality' => $municipality

        ];
        
        return response()->json($payload, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
