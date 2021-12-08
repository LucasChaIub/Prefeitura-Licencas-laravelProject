@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-lg text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
