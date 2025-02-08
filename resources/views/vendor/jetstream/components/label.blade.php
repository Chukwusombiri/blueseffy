@props(['value'])

<label {{ $attributes->merge(['class' => 'block archivo-400 text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
