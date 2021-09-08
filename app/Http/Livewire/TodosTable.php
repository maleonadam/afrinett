<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TodosTable extends Component
{
    public $todos;
    
    public function render()
    {
        return view('livewire.todos-table');
    }
}
