@props(['value'])

<label {{ $attributes->merge(['class' => 'block archivo-400 text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
