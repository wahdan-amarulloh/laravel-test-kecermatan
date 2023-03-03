<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class SubscriptionTable extends DataTableComponent
{
    protected $model = Subscription::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->searchable()
                ->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Status", "status")
                ->searchable()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make('Name')
                ->format(
                    fn ($value, $row, Column $column) => view('components.table.actions')
                ),
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
                        ->location(fn ($row) => 'https://'.$row->id.'google1.com')
                        ->attributes(function ($row) {
                            return [
                                'target' => '_blank',
                                'class' => 'underline text-blue-500',
                            ];
                        }),
                    LinkColumn::make('Disable')
                        ->title(fn ($row) => 'Disable')
                        ->location(fn ($row) => 'https://'.$row->id.'google2.com')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-orange-500',
                            ];
                        }),
                    LinkColumn::make('Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => '#')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-red-600',
                                'wire:click' => 'delete('.$row->id.')',
                            ];
                        }),
                ]),
        ];
    }

    public function delete(Subscription $subscription)
    {
        $subscription->status = 'NA';
        $subscription->save();
    }
}
