@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-1 text-lg font-medium leading-5 text-[#FEFEFE] transition duration-150 ease-in-out'
            : 'px-1 border-b-2 border-transparent text-sm font-medium leading-5 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
