<?php

namespace App\Exports;

use App\Models\RiceOut;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class RiceOutExport implements WithColumnFormatting, FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RiceOut::with('riceDistribution')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Nama Distribusi',
            'Jumlah',
            'Destinasi',
            'Status',
            'Dibuat pada',
        ];
    }

    public function map($riceOut): array
    {
        return [
            $riceOut->id,
            $riceOut->riceDistribution->title,
            number_format($riceOut->riceDistribution->quantity_distributed, 0, ',', '.') . ' Kg',
            $riceOut->riceDistribution->destination,
            $riceOut->riceDistribution->status,
            Date::dateTimeToExcel($riceOut->riceDistribution->distribution_date),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
