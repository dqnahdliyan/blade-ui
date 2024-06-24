@props(['align' => 'right'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'origin-top-right right-0';
            break;
    }
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak
         style="display: none;" @click="open = false" @keydown.escape.window="open = false"
        {{ $attributes->twMerge($alignmentClasses . ' absolute z-50 mt-2 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 [&_hr]:-mx-1 [&_hr]:my-1 text-popover-foreground shadow-md') }}>
        {{ $content }}
    </div>
</div>
