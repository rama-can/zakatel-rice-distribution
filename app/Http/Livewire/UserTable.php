<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make('Actions')
                ->label(function ($row, Column $column) {
                    $delete = '<button class="btn border-indigo-500 hover:border-indigo-400 font-bold p-2 rounded m-1" @click="showModal = true; userId = '.$row->id.'; userData = \''.$row->name.'\'">
                        <svg class="w-4 h-4 fill-current text-red-500 shrink-0" viewBox="0 0 16 16">
                            <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                        </svg>
                    </button>';
                    $edit = '<a href="'.route('users.edit', $row->id).'" class="btn border-indigo-500 hover:border-indigo-400 font-bold p-2 rounded m-1">
                            <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-200 shrink-0" viewBox="0 0 16 16">
                                <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                            </svg>
                        </a>';
                    return  $delete . $edit;
                    // return view('admin.pages.user.action', ['user' => $row]);
                })->html(),
        ];
    }

    public function filters(): array
    {
        return [
            DateFilter::make('Created At')
            ->filter(function(Builder $builder, string $value) {
                $builder->where('created_at', '>=', $value);
            }),
        ];
    }
}