<?php

namespace App\Exports;

use App\Models\RiceIn;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class RiceInExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RiceIn::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Jumlah',
            'Sumber',
            'Nama Sumber',
            'Dibuat pada',
        ];
    }

    public function map($riceIn): array
    {
        return [
            $riceIn->id,
            number_format($riceIn->quantity, 0, ',', '.') . ' Kg',
            $riceIn->source,
            $riceIn->contributor_name,
            Date::dateTimeToExcel($riceIn->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
