<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class QuestionTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Question::class;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public array $bulkActions = [
        'groupSelected' => 'Add To Group',
    ];

    /**
     * @var @var \Illuminate\Support\Collection
     */
    public $groups;

    public function builder(): Builder
    {
        return Question::query()
        ->with('groups');
    }

    public function mount(): void
    {
        $this->groups = Group::all();
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Group')
            ->setFilterPillTitle('Group')
            ->options($this->groups?->pluck('name', 'id')->toArray() ?? [])
            ->filter(function (Builder $builder, string $value) {
                $builder->whereHas('groups', function ($query) use ($value) {
                    $query->where('group_id', '=', $value);
                });
            }),
        ];
    }

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
            Column::make('Id', 'id')
            ->searchable()
                ->sortable(),
            Column::make('Name', 'name')
            ->searchable()
                ->sortable(),
            Column::make('A', 'A')
                ->sortable(),
            Column::make('B', 'B')
                ->sortable(),
            Column::make('C', 'C')
                ->sortable(),
            Column::make('D', 'D')
                ->sortable(),
            Column::make('E', 'E')
                ->sortable(),
            ComponentColumn::make('Groups', 'id')
                ->component('badge')
                ->attributes(fn ($value, $row, Column $column) => [
                    'items' => $row->groups,
                    'action' => [
                        'id' => $row->id,
                        'detachID' => null,
                    ],
                ]),
            Column::make('Status', 'status')
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

    public function groupSelected()
    {
        if (! count($this->getSelected())) {
            return;
        }

        $html = view('modals.question-group')
        ->with('groups', $this->groups)
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
            'showCancelButton' => false,
        ]);
    }

    public function attachGroup($id)
    {
        $group = Group::find($id);

        $group->questions()->syncWithoutDetaching($this->getSelected());
    }

    public function detachSingle(Question $question, $id)
    {
        $question->groups()->detach($id);
    }
}
