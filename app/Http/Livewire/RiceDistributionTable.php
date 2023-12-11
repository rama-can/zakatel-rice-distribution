<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\RiceDistribution;
use Vinkla\Hashids\Facades\Hashids;

class RiceDistributionTable extends DataTableComponent
{
    protected $model = RiceDistribution::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            // Column::make("Destination", "destination")
            //     ->sortable(),
            Column::make("Distribution Date", "distribution_date")
                ->sortable()
                ->format(function ($value) {
                    return date('d-m-Y', strtotime($value));
                }),
            Column::make("Quantity", "quantity_distributed")
                ->sortable()
                ->format(function ($value) {
                    return number_format($value, 0, ',', '.') . ' Kg';
                }),
            Column::make("Status", "status")
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
            Column::make('Actions')
                ->label(function ($row) {
                    $Id = Hashids::encode($row->id);
                    $delete = '<button class="btn border-indigo-500 hover:border-indigo-400 font-bold p-2 rounded m-1" @click="showModal = true; distributionId = \''.$Id.'\'; distibutionData = \''.$row->title.'\'">
                        <svg class="w-4 h-4 fill-current text-red-500 shrink-0" viewBox="0 0 16 16">
                            <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                        </svg>
                    </button>';
                    $edit = '<a href="'.route('rice-distributions.edit', $Id).'" class="btn border-indigo-500 hover:border-indigo-400 font-bold p-2 rounded m-1">
                            <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-200 shrink-0" viewBox="0 0 16 16">
                                <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                            </svg>
                        </a>';
                    return  $delete . $edit;
                    // return view('admin.pages.user.action', ['user' => $row]);
                })->html(),
        ];
    }
}