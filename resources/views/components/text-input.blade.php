@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-[#496569] border-[#77AFB7] border-2 focus:border-[#77AFB7] focus:border-2 focus:ring-0 active:border-[#77AFB7] active:border-2 rounded shadow-sm placeholder-[#77AFB7] placeholder-sm']) !!}>
