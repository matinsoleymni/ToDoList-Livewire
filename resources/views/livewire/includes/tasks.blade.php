<div>
    <div class="flex justify-center py-2"> 
        <input wire:model.live.debounce.500ms='search' placeholder="Search..." class="w-1/2 p-1 px-2 text-xl border-[3px] border-pink-600 border-solid focus:border-pink-700 focus:outline-none" type="text" name="" id="">
    </div>
    <div class="flex flex-col py-4">    
        @foreach ($todos as $todo)
            <div class="flex justify-between p-1 px-3 mx-4 my-2 bg-white rounded-lg g">
                <div class="flex items-center gap-4">
                    <input class="w-5 h-5" type="checkbox">
                    <h1 class="text-lg">{{$todo->title}}</h1>
                </div>
                <div>
                    <p wire:click='delete({{$todo->id}})' class="text-red-500 cursor-pointer">Delete</p>
                </div>
            </div>
        @endforeach
    </div>
    {{$todos->links()}}
    
</div>