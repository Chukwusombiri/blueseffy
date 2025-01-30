<x-app-layout>
    <section class="relative bg-white dark:bg-gray-800 py-16">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="border-b border-gray-300 dark:border-gray-700 pb-8">
                <div class="w-full h-auto md:h-[70vh] xl:h-auto mb-4">
                    <img src="{{ url('storage/' . $article->cover_img) }}" alt="blog" class="w-full h-full">
                </div>
                <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase">Published:
                    {{ date('M d, y', strtotime($article->created_at)) }}</p>
                <h2 class="mt-4 text-gray-800 dark:text-gray-100 font-bold text-2xl mb-2">{{ $article->title }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 leading-loose mb-4">{{ $article->main_content }}</p>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">{{ $article->sub_title }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 leading-loose mb-4">{{ $article->sub_content }}</p>
                <p class="text-sm text-gray-700 dark:text-gray-200 flex gap-2">
                    <span>CATEGORY:</span>
                    <a class="text-indigo-600 dark:text-blue-500 underline"
                        href="{{ route('articles', [$article->category_id]) }}">
                        {{ $article->category->name }}
                    </a>
                </p>
            </div>
            <div class="py-8 flex flex-col gap-4">
                <div class="flex items-center gap-2">
                    <img src="/storage/{{ $article->author_img }}" alt="user" class="rounded-full w-12 h-12">
                    <h4 class="text-gray-700 dark:text-gra-200 text-md font-semibold tracking-wide">
                        {{ $article->author }}</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $article->author_comment }}</p>
            </div>
            @if (count($article->articlecomments) > 0)
                <div class="pt-4 pb-8 flex flex-col gap-6">
                    <h3 class="text-gray-800 dark:text-gray-100 text-xl font-semibold">
                        {{ $article->articlecomments->count() }} Comments on
                        this post</h3>
                    <ul class="list-none" role="listbox">
                        @foreach ($article->articlecomments as $comment)
                            <li class="flex flex-col gap-2">
                                <div class="flex items-center gap-1">
                                    <img src="/storage/{{ $comment->commenter_img }}" alt="user"
                                        class="rounded-full h-10 w-10">
                                    <h6 class="text-xs text-gray-700 dark:text-gray-200 font-semibold tracking-wide">
                                        {{ $comment->commenter }}</h6>
                                </div>
                                <div class="">
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">{{ $comment->comment }}
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="w-full max-w-xl mx-auto py-8">
                <h3 class="w-full text-center text-xl font-semibold text-gray-700 dark:text-gray-100">Leave a comment
                </h3>
                @livewire('contact-us')
            </div>
            @if (count($artswithcomments) > 0)
                <div class="py-8">
                    <h3 class="text-gray-700 dark:text-gray-200 font-semibold text-2xl mb-4">Popular News</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center gap-6">
                        @foreach ($artswithcomments as $item)
                            <a href="{{ route('readarticle', [$item->id]) }}" class="flex flex-col gap-4">
                                <img src="/storage/{{ $item->cover_img }}" class="w-full h-auto md:h-[400px]"
                                    alt="blog">
                                <div class="w-full gap-1">
                                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                                        {{ $item->title }}
                                    </h4>
                                    <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase">Published:
                                        {{ date('M d, y', strtotime($item->created_at)) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <x-footer></x-footer>
</x-app-layout>
