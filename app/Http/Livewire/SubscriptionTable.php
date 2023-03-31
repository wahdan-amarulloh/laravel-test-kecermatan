<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class SubscriptionTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Subscription::class;

    protected $listeners = [
        'confirmedDelete' => 'confirmedDelete',
        'confirmedDisable' => 'confirmedDisable',
        'refreshComponent' => '$refresh',
    ];

    public Subscription $currentSubscription;

    public Collection $groups;

    public function builder(): Builder
    {
        return Subscription::query()
        ->with('groups');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function mount()
    {
        $this->groups = Group::all();
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
            Column::make('Day', 'Days')
                ->sortable(),
            Column::make('Price', 'price')
                ->sortable(),
            ComponentColumn::make('Groups', 'id')
            ->component('badge')
            ->attributes(fn ($value, $row, Column $column) => [
                'items' => $row->groups,
            ]),
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
                    LinkColumn::make('Disable')
                    ->title(fn ($row) => 'Disable')
                    ->location(fn ($row) => '#')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-green-600',
                                'wire:click' => 'askDisable('.$row->id.')',
                            ];
                        }),
                    LinkColumn::make('Group')
                    ->title(fn ($row) => 'Group')
                    ->location(fn ($row) => '#')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'underline text-indigo-600',
                                'wire:click' => 'askGroup('.$row->id.')',
                            ];
                        }),
                ]),
        ];
    }

    public function askDisable(Subscription $subscription)
    {
        $this->alert('question', 'Confirm Disable '.$subscription->name.' ?', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Disable',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'inputAttributes' => [
                'value' => $subscription->id,
            ],
            'onConfirmed' => 'confirmedDisable',
        ]);
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

    public function askGroup(Subscription $subscription)
    {
        $this->currentSubscription = $subscription;
        $html = view('modals.group')
        ->with('groups', $this->groups)
        ->with('subscription', $subscription)
        ->render();
        $this->alert('question', 'Confirm delete  ?', [
            'position' => 'center',
            'title' => null,
            'icon' => null,
            'timer' => null,
            'toast' => false,
            'target' => 'table',
            'html' => $html,
            'showConfirmButton' => false,
            'confirmButtonText' => 'Delete',
            'showCancelButton' => false,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'confirmedDelete',
        ]);
    }

    public function detachGroup($id)
    {
        $this->currentSubscription->groups()->detach($id);
    }

    public function attachGroup($selectedGroupId)
    {
        if (empty($selectedGroupId) || $selectedGroupId === '') {
            return;
        }

        $check = $this->currentSubscription->groups()->where('group_id', $selectedGroupId)->exists();

        if (! $check) {
            $this->currentSubscription->groups()->attach($selectedGroupId);
        }
    }

    public function confirmedDisable($data)
    {
        $id = $data['data']['inputAttributes']['value'];
        $subscription = Subscription::query()->where('id', $id)->first();
        $subscription->status = 'NA';
        $subscription->save();

        $this->alert('success', $subscription->name.' berhasil di disable ');
    }

    public function confirmedDelete($data)
    {
        $id = $data['data']['inputAttributes']['value'];
        $subscription = Subscription::query()->where('id', $id)->first();
        $subscription->delete();

        $this->alert('success', $subscription->name.' berhasil di hapus ');
    }
}
