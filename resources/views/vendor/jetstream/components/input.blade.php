@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 focus:border-indigo-300 dark:focus:border-blue-300 rounded-md shadow-sm bg-inherit text-gray-800 dark:text-gray-100']) !!}>
