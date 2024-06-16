@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-1 text-lg font-bold rounded-md border-transparent text-[#77AFB7] leading-5 shadow-md bg-[#FDFDFD] my-1'
            : 'px-1 text-lg font-bold leading-5 shadow-none hover:shadow-md bg-[#77AFB7] text-[#FDFDFD] my-1';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
