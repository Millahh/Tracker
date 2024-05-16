@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-1 text-lg font-bold leading-5 text-[#FEFEFE] hover:shadow-md focus:shadow-md active:shadow-md'
            : 'px-1 border-b-2 border-transparent text-sm font-medium leading-5';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
