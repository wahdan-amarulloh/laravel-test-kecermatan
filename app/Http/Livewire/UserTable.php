<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function builder(): Builder
    {
        return User::query()
        ->with('plan');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        debug(
            User::query()
            ->with('plan')
            ->where('id', 3)->first()->plan
        );
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Plan Name", "plan.name")
            ->format(
                fn ($value, $row, Column $column) => $value ?? $row->plan->name
            )
            ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            ComponentColumn::make('Actions', 'id')
                ->component('table.actions')
                ->attributes(fn ($value, $row, Column $column) => [
                    'edit' => true,
                    'editLabel' => 'Change Plan',
                    'id' => $value,
                ]),
        ];
    }
}
