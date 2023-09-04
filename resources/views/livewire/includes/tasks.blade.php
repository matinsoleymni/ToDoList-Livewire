<div>
    <div class="flex justify-center py-2"> 
        <input wire:model.live.debounce.500ms='search' placeholder="Search..." class="w-1/2 p-1 px-2 text-xl border-[3px] border-pink-600 border-solid focus:border-pink-700 focus:outline-none" type="text" name="" id="">
    </div>
    <div class="flex flex-col py-4">    
        @foreach ($todos as $todo)
            <div class="flex justify-between p-1 px-3 mx-4 my-2 bg-white rounded-lg">
                <div x-data="{ open: false }" class="flex items-center gap-4">
                    @if ($editTodoId == $todo->id)
                        <div>
                            <input wire:model='editTodoNewTitle' class="block p-2 text-lg bg-gray-100 rounded-lg focus:outline-none" type="text">
                            @error("editTodoNewTitle")
                                <p class="mt-2 text-red-500">{{$message}}</p>
                            @enderror
                            <button wire:click='update' class="p-2 mt-2 text-white bg-green-500 rounded-lg">Update</button>
                            <button wire:click='cancel' class="p-2 mt-2 text-white bg-red-500 rounded-lg">Cancel</button>
                        </div>
                    @else
                        @if ($todo->is_complete)
                            <input checked wire:click='toggle({{$todo->id}})' class="w-5 h-5" type="checkbox">
                        @else
                            <input wire:click='toggle({{$todo->id}})' class="w-5 h-5" type="checkbox">
                        @endif
                        <h1 @click=" open = !open " class="text-lg cursor-pointer select-none">{{$todo->title}}</h1>   
                    @endif
                    <span x-show="open">
                        {{$todo->created_at}}
                    </span>
                </div>
                <div>
                    <p wire:click='edit({{$todo->id}})' class="text-blue-500 cursor-pointer">Edit</p>
                    <p wire:click='delete({{$todo->id}})' class="text-red-500 cursor-pointer">Delete</p>
                </div>
            </div>
        @endforeach
    </div>
    {{$todos->links()}}
    
</div>