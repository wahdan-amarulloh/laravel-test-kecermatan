<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class GroupTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Group::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::make('Name', 'name')
                ->sortable(),
            Column::make('Created at', 'created_at')
                ->sortable(),
            Column::make('Updated at', 'updated_at')
                ->sortable(),
            ButtonGroupColumn::make('Actions')
            ->unclickable()
            ->attributes(function ($row) {
                return [
                    'class' => 'space-x-2',
                ];
            })
            ->buttons([
                LinkColumn::make('Edit')
                    ->title(fn ($row) => 'Edit')
                    ->location(fn ($row) => '#')
                    ->attributes(function ($row) {
                        return [
                            '@click' => 'askEdit('.$row->id.')',
                            'class' => 'underline text-blue-500',
                        ];
                    }),
            ]),
        ];
    }
}
