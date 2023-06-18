



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            
            <div class="py-4">
                <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
        
                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
        
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold">Content:</label>
                        <textarea id="content" name="content" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ $post->content }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold">Image:</label>
                        <input type="file" id="image" name="image" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    @if ($post->image)
                        <img src="{{ asset('images/posts/' . $post->image) }}" alt="Post Image" class="w-40 h-auto rounded-lg">
                    @endif
        
                    <div>
                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-red-700 text-black rounded-lg">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>