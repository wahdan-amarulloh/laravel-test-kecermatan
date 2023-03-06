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
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
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
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
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
                ]),
        ];
    }
}
