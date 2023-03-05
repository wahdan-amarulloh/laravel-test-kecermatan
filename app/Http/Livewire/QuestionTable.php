<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

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
        ];
    }
}
