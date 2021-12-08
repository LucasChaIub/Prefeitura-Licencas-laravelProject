@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-yellow-300 focus:ring-opacity-50 focus-within:text-primary-600']) !!}>
