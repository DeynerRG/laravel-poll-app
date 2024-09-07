<x-layouts.app>
    <div class="p-3">
        <h1 class="text-4xl lg:text-6xl font-semibold">Fast Poll</h1>
        @livewire('create-poll', [])
        @livewire('polls', [])
    </div>
</x-layouts.app>