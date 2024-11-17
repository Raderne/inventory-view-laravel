@props(['active'])

@php
$classes = "inline-flex items-center px-8 py-4 border-l-2 border-transparent text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out";

$classes = ($active ?? false)
? $classes . ' border-white text-white bg-dark '
: $classes . ' border-transparent text-gray-500 ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}
    title="{{ $attributes->get('title') }}">
    <i class='{{ $slot }} text-2xl'></i>
</a>