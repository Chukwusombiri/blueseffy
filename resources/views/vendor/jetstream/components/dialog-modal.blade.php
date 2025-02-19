@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-start text-lg text-gray-800 dark:text-gray-200">
            {{ $title }}
        </div>

        <div class="text-start mt-4 text-gray-800 dark:text-gray-200">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-900 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
