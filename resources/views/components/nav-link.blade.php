
@props([
    'active' => false
])
<a 
    {{ $attributes }} 
    wire:navigate
>{{ $slot }}</a>