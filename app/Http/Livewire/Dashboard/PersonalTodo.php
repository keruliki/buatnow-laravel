<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Tasks;
use Livewire\Component;

class PersonalTodo extends Component
{
    public $tasks = [];
    public $editTask = false;
    public $title, $due_date;
    public $mode;


    public function addTask()
    {
        $this->mode = 'add';
        $this->editTask =  true;
    }

    public function editTask()
    {
        $this->mode = 'edit';
        $this->editTask =  true;
    }

    public function submitTask(){
        $this->validate([
            'title' => 'required',
        ]);

        $data = [
            'title' => $this->title,
            'due_date' => $this->due_date,
            'user_id'=> auth()->user()->id,
            'pic_user_id' => auth()->user()->id,
            'status' => 'Pending'
        ];

        Tasks::create($data);

        $this->editTask = false;
    }

    public function mount()
    {
        $this->tasks = auth()->user()->tasks()->get();
    }

    public function render()
    {

        $this->tasks = auth()->user()->tasks()->get();
        return view('livewire.dashboard.personal-todo');
    }
}
