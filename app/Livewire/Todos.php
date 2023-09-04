<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class Todos extends Component
{
    use WithPagination;

    public $title = "";
    public $search = "";
    
    public function show(){
        
    }

    public function send(){
        $valid = $this->validate([
            "title" => "required|min:2|max:24"
        ]);
        
        Todo::create($valid);

        $this->reset("title");
        
        session("status" , "created");
    }

    public function delete($todoID){
        Todo::find($todoID)->delete();

    }


    public function render()
    {
        return view('livewire.todo' , [
            "todos" => Todo::latest()->where('title' , 'like' , "%{$this->search}%")->paginate(5) ,
        ]);
    }
}
