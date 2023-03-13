<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class SubscriptionTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Subscription::class;

    protected $listeners = [
        'confirmedDelete' => 'confirmedDelete',
        'refreshComponent' => '$refresh',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Status', 'status')
                ->searchable()
                ->sortable(),
            Column::make('Attempt', 'attempt')
                ->sortable(),
            Column::make('Price', 'price')
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
                    LinkColumn::make('Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => '#')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-red-600',
                                'wire:click' => 'askDelete('.$row->id.')',
                            ];
                        }),
                ]),
        ];
    }

    public function askDelete(Subscription $subscription)
    {
        $this->alert('question', 'Confirm delete '.$subscription->name.' ?', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Delete',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'inputAttributes' => [
                'value' => $subscription->id,
            ],
            'onConfirmed' => 'confirmedDelete',
        ]);
    }

    public function confirmedDelete($data)
    {
        $id = $data['data']['inputAttributes']['value'];
        $subscription = Subscription::query()->where('id', $id)->first();
        $subscription->delete();

        $this->alert('success', $subscription->name.' berhasil di hapus ');
    }
}
