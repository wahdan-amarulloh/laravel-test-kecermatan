<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\QuestionDetail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class QuestionIndex extends Component
{
    use LivewireAlert;

    public $isLoading = false;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.question-index');
    }

    public function randomize(Question $question)
    {
        // randomize questions
        $questions = collect([
            'A' => $question->A,
            'B' => $question->B,
            'C' => $question->C,
            'D' => $question->D,
            'E' => $question->E,
        ]);

        $collections = collect();
        $uniqueCollectionsCount = 0;

        while ($uniqueCollectionsCount < 20) {
            $keys = $questions->keys()->toArray();
            $null_key = $keys[random_int(0, count($keys) - 1)];
            $values = $questions->except($null_key)->values()->random(4)->toArray();
            $values[] = null;
            shuffle($values);
            $newCollection = collect(array_combine($keys, $values));
            if ($collections->contains($newCollection)) {
                continue;
            }
            $answer = array_search(null, $newCollection->toArray());
            $newCollection->put('answer', $answer);
            $newCollection->put('question_id', $question->id);
            $collections->push($newCollection);
            $uniqueCollectionsCount++;
        }

        // dd($collections->toArray());

        foreach ($collections as $collection) {
            QuestionDetail::create([
                'question_id' => $collection['question_id'],
                'A' => $collection['A'],
                'B' => $collection['B'],
                'C' => $collection['C'],
                'D' => $collection['D'],
                'E' => $collection['E'],
                'answer' => $collection['answer'],
            ]);
        }

        $this->alert('success', 'Data Berhasil di generate');

        $this->emit('refreshComponent');
    }
}
