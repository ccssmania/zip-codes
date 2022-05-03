<?php

namespace App\Imports;


use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class SheetImport implements ToModel, WithHeadingRow, WithChunkReading
{
    use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $settlementTypeName = $row['d_tipo_asenta'];
        $settlementType = SettlementType::firstOrCreate(
            ['name' => $settlementTypeName]
        );

        $settlementKey = $str = ltrim($row['id_asenta_cpcons'], '0');

        $settlement = Settlement::firstOrCreate(
            ['key' => $settlementKey, 'name' => $row['d_asenta'], 'zone_type' => $row['d_zona'], 'settlement_type_id' => $settlementType->id]
        );

        $zipCode = $row['d_codigo'];
        $zipCodeModel = ZipCode::find($zipCode);
        if ($zipCodeModel) {
            $zipCodeModel->settlements()->attach($settlement);
        } else {
            $zipCodeModel = new ZipCode();
            $zipCodeModel->id = $zipCode;
            $zipCodeModel->locality = isset($row['d_ciudad']) ? $row['d_ciudad'] : null;
            $federalEntityId = $row['c_estado'];
            $federalEntity = FederalEntity::firstOrCreate(
                ['id' => $federalEntityId, 'name' => $row['d_estado']],
                ['code' => isset($row['c_CP']) ? $row['c_CP'] : null]
            );
            $zipCodeModel->federal_entity_id = $federalEntityId;
            $municipalityId = $row['c_mnpio'];
            $municipality = Municipality::firstOrCreate(
                ['id'=> $municipalityId],
                ['name' => isset($row['D_mnpio']) ? $row['D_mnpio'] : null]
            );

            $zipCodeModel->municipality_id = $municipalityId;

            $zipCodeModel->save();

            $zipCodeModel->settlements()->attach($settlement);
        }


        return $zipCodeModel;

    }

    public function chunkSize(): int
    {
        return 500;
    }
}
