<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <h1 class="text-2xl font-bold mb-4">Create Post</h1>
        
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold">Content:</label>
                        <textarea id="content" name="content" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
        
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold">Image:</label>
                        <input type="file" id="image" name="image" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
        
                    <div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-lg">Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
