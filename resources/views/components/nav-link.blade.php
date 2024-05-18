@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-1 text-lg font-bold rounded-md border-transparent text-[#77AFB7] leading-5 shadow-xl bg-[#FDFDFD]'
            : 'px-1 text-lg font-bold leading-5 shadow-none bg-[#77AFB7] text-[#FDFDFD]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
