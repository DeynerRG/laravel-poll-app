<div class="mt-10 w-full p-2">
    {{-- Success is as dangerous as failure. --}}
    <h1 class="font-bold text-2xl mb-10">My polls</h1>
    <div class="flex flex-col gap-5">
        @foreach($polls as $poll)
        <div class="border rounded-lg p-5">
            <p class="font-bold text-2xl mb-5">{{ $poll->title }}</p>
            <ul class="flex flex-col gap-3 items-start">
                @foreach($poll->options as $option)
                <li class="p-3 border rounded-lg  w-full flex justify-between items-center"> 
                    <span>{{ $option->name }}</span>
                    <div class="flex gap-3 items-center ">
                        <strong>{{ $option->votes->count() }}</strong>
                        <button wire:click="voteFor({{ $option->id }})" class="rounded-lg p-2 bg-gray-100 hover:bg-blue-500 hover:text-white">vote</button> 
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>

</div>