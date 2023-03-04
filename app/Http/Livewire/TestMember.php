<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class TestMember extends Component
{
    public $started = true;
    public $percentage = 0;
    public $answerStep = 0;
    public $answer;
    public $totalQuestions;
    public $questions;

    public function mount()
    {
        $this->getQuestions();
        $this->getAnswer();
    }

    public function render()
    {
        return view('livewire.test-member');
    }

    public function start()
    {
        $this->started = true;
    }

    public function stop()
    {
        $this->reset((['started','percentage','answerStep']));
        $this->getQuestions();
        $this->getAnswer();
    }

    public function toggle()
    {
        $this->started = ! $this->started;
    }

    public function getAnswer()
    {
        $this->answer = $this->questions->detail->slice($this->answerStep, 1)->first();
    }

    public function answer($answer)
    {
        $this->answerStep++;
        $this->calculatePercentage($this->answerStep, $this->totalQuestions);
        if ($this->percentage < 100) {
            $this->getAnswer();
        } else {
            $this->stop();
        }
    }

    public function getQuestions()
    {
        $this->questions = Question::with('detail')
        ->inRandomOrder()
        ->first();
        $this->totalQuestions = $this->questions->detail->count();
    }

    public function calculatePercentage($part, $whole)
    {
        $this->percentage = ($part / $whole) * 100;
    }
}
