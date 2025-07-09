@props(['value'])

<label {{ $attributes->merge(['class' => 'errors font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
