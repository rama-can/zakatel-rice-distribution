<?php

namespace App\Http\Livewire;

use App\Models\RiceOut;
use App\Exports\RiceOutExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class RiceOutTable extends DataTableComponent
{
    protected $model = RiceOut::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "riceDistribution.title")
                ->sortable(),
            Column::make("Amount", "riceDistribution.quantity_distributed")
            ->format(function ($value) {
                return number_format($value, 0, ',', '.') . ' Kg';
            }),
            Column::make('Destination', "riceDistribution.destination")
                ->format(fn ($value) => $value ? substr($value, 0, 20) . (strlen($value) > 20 ? '...' : '') : '-'),
                Column::make("Status", "riceDistribution.status")
                ->sortable()
                    ->format(function ($value) {
                        if ($value === 'pending') {
                            return '<span class="inline-flex items-center rounded-md bg-red-200 dark:bg-red-800 dark:bg-opacity-50 px-2.5 py-1 text-xs font-medium text-red-700 dark:text-red-200 ring-1 ring-inset ring-red-600/10 dark:ring-red-300/10">Pending</span>';
                        } elseif ($value === 'dalam pengiriman') {
                            return '<span class="inline-flex items-center rounded-md bg-yellow-200 dark:bg-yellow-800 dark:bg-opacity-50 px-2.5 py-1 text-xs font-medium text-yellow-700 dark:text-yellow-200 ring-1 ring-inset ring-yellow-600/10 dark:ring-yellow-300/10">Dalam Pengirimian</span>';
                        } elseif ($value === 'selesai') {
                            return '<span class="inline-flex items-center rounded-md bg-green-200 dark:bg-green-800 dark:bg-opacity-50 px-2.5 py-1 text-xs font-medium text-green-700 dark:text-green-200 ring-1 ring-inset ring-green-600/10 dark:ring-green-300/10">Selesai</span>';
                        }
                        return $value;
                    })->html(),
            Column::make("Date", "riceDistribution.distribution_date")
                ->format(function ($value) {
                    return date('d-m-Y', strtotime($value));
                }),
        ];
    }

    public function builder(): Builder
    {
        return RiceOut::query()->with('riceDistribution')->select();
    }

    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $users = $this->getSelected();
        $this->clearSelected();
        return Excel::download(new RiceOutExport($users), 'rice-out.xlsx');
    }
}