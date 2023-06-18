<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4">
                <h1 class="text-2xl font-bold mb-4">Posts</h1>   
                @forelse ($posts as $post)
                
                    <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                        <div class="flex items-center mb-2 ">
                            @if ($post->user && $post->user->profile_picture)
                                <img src="{{ asset('images/profile/' . $post->user->profile_picture) }}" alt="Profile Image" class="py-2 px-2  w-16 p-10 rounded-full ">
                            @endif
                            @if ($post->user)
                              
                                <strong class="font-bold ">{{ $post->user->name }}</strong>
                            @endif
                        </div>
                       
                        <p>{{ $post->content }}</p>
                        @if ($post->image)
                            <img src="{{ asset('images/posts/' . $post->image) }}" alt="Post Image" class="w-40 h-auto rounded-lg">
                        @endif
                        <div class="flex mt-4 py-2 px-2">
                            <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div>No posts found.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
