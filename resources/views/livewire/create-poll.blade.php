<div class="mt-5 w-full">
    <h1 class="font-bold text-2xl mb-10">Create poll</h1>
    @session('status')
        <div class="p-2 rounded-lg text-center bg-blue-500 text-white font-semibold text-sm">
            {{ $message }}
        </div>    
    @endsession
    <form  wire:submit.prevent="createPoll" action="">
        <div class="flex flex-col gap-2 my-2">
            <label 
                for="title"
            >
                <strong>Title:</strong>
            </label>
            <textarea 
                wire:model.live="title" 
                name="title" 
                id="title" 
                rows="5" 
                class="w-full border rounded-lg p-2"
                placeholder="Enter poll"
            ></textarea>
            @error('title')
                <p class="text-red-500 text-sm rounded-lg p-1 font-semibold">{{ $message }}</p>
            @enderror
        </div>
        {{-- options-start --}}
        <ul>
            @foreach($options as $index => $option)
                <li class="flex flex-col my-3 ">
                    <span class="flex gap-2 w-full items-center">
                        <input wire:model.live="options.{{ $index }}"  type="text" class="border rounded-lg p-2 w-full" placeholder="option {{ $index + 1 }}">
                        <button wire:click.prevent="removeOption({{ $index }})" class="hover:bg-slate-100 p-2 rounded-lg active:scale-95 text-slate-700" >
                            <x-icons.x-mark/>
                        </button>
                    </span>
                    @error("options.$index")
                        <p class="text-red-500 text-sm rounded-lg p-1 font-semibold">{{ $message }}</p>
                    @enderror
                </li>
            @endforeach
        </ul>
        @error('options')
            <p class="text-red-500 text-sm rounded-lg p-1 font-semibold">{{ $message }}</p>
        @enderror
        <button wire:click.prevent="addOption" class="flex gap-2 hover:bg-slate-100 p-2 rounded-lg active:scale-95"> 
            <span class="text-slate-700">
                <x-icons.plus/>
            </span>
            Add option
        </button>
        {{-- options-end --}}
        <div class="flex justify-end gap-5 mt-5">
            <button
                wire:click.prevent="resetFields"
                class="font-semibold p-2"
            >Reset</button>
            <input 
                type="submit" 
                value="Create poll"
                class="bg-slate-800 hover:bg-slate-700 text-white p-2 rounded-lg font-bold ring-2 ring-slate-500 cursor-pointer"    
            >
        </div>
        
    </form>
</div>
