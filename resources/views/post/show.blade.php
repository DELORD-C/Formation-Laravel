<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
    <div class="flex-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mx-auto mb-4 mt-4 sm:max-w-md">
            <p class="font-semibold">{{ $post->subject }}</p>
            <p>{{ $post->content }}</p>
            <x-back>
                <x-slot name="text">
                    Back
                </x-slot>
            </x-back>
        </div>
    </div>
</x-app-layout>
