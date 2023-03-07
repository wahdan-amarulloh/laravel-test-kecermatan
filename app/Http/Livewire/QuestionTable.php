<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class QuestionTable extends DataTableComponent
{
    protected $model = Question::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTrAttributes(function ($row, $index) {
            return [
                'default' => true,
                'class' => 'uppercase',
              ];
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("A", "A")
                ->sortable(),
            Column::make("B", "B")
                ->sortable(),
            Column::make("C", "C")
                ->sortable(),
            Column::make("D", "D")
                ->sortable(),
            Column::make("E", "E")
                ->sortable(),
            Column::make("Status", "status")
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
                                'class' => 'text-blue-500 hover:text-blue-600',
                                '@click' => 'toggleDetail('.$row->id.')',
                            ];
                        }),
                    LinkColumn::make('Disable')
                        ->title(fn ($row) => 'Disable')
                        ->location(fn ($row) => '#')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'text-red-500 hover:text-red-600',
                                '@click' => 'askDisable('.$row->id.')',
                            ];
                        }),
                ]),
        ];
    }
}
