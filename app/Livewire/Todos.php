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

    public $editTodoId;
    public $editTodoNewTitle;

    public function send(){
        $valid = $this->validate([
            "title" => "required|min:2|max:24"
        ]);
        
        Todo::create($valid);

        $this->reset("title");
        
        session("status" , "created");

        $this->resetPage();
    }

    public function delete($todoID){
        Todo::find($todoID)->delete();
    }

    public function edit($todoID){
        $this->editTodoId = $todoID;
        $this->editTodoNewTitle = Todo::find($todoID)->title;
    }

    public function cancel(){
        $this->reset("editTodoId" , "editTodoNewTitle");
    }

    public function update(){
        $this->validate([
            "editTodoNewTitle" => "required|min:2|max:50"
        ]);
        Todo::find($this->editTodoId)->update([
            "title" => $this->editTodoNewTitle,
        ]);

        $this->cancel();
    }

    public function toggle($todoID){
        $todo = Todo::find($todoID);
        $todo->is_complete = !$todo->is_complete;
        $todo->save();
    }

    public function render()
    {
        return view('livewire.todo' , [
            "todos" => Todo::latest()->where('title' , 'like' , "%{$this->search}%")->paginate(5) ,
        ]);
    }
}
