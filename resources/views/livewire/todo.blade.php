<div class="w-1/2 mx-auto mt-10 bg-purple-100 rounded-lg">
    <div class="">
        <div class="py-4">
            <h1 class="text-3xl font-medium text-center ">ToDo App - Tall Stack</h1>
        </div>
        <form wire:submit="send" class="flex justify-center py-2"> 
            <input wire:model="title" placeholder="Write ToDo" class="w-1/2 relative p-1 px-2 text-xl border-[3px] border-purple-600 border-solid focus:border-purple-700 focus:outline-none" type="text" name="" id="title">
            @error("title")
            <label class="absolute text-lg text-red-500 mt-11" for="title">{{$message}}</label>
            @enderror
            <button class="px-3 py-1 text-white bg-purple-500">Add</button>
        </form>
        
        <div id="hr" class="w-full h-1 my-5 bg-purple-900 rounded-full"></div>
        <div>
            @include("livewire.includes.tasks")
        </div>
    </div>
    
</div>