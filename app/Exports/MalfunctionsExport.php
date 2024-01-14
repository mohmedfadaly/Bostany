<?php

namespace App\Exports;

use App\Models\Malfunction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;



class MalfunctionsExport implements FromQuery, WithHeadings,ShouldAutoSize
{
    use Exportable; 
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            "code",
            "desc_ar",
            "desc_en",
            "potential_causes_ar",
            "potential_causes_en",
            "symptoms_ar",
            "symptoms_en",
            "solution_ar",
            "solution_en",
            "maker_code",
            "model_code",
        ];
    }

    public function query()
    {
        return Malfunction::query()->select(
            "code",
            "desc_ar",
            "desc_en",
            "potential_causes_ar",
            "potential_causes_en",
            "symptoms_ar",
            "symptoms_en",
            "solution_ar",
            "solution_en",
            "maker_code",
            "model_code"
        );
    }
    

}
