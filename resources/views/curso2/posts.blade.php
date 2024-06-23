<x-layout >
       <x-slot:heading>
        Aquí se mostrarán todos los posts
    </x-slot:heading>
        <ul>
            <div class="space-y-4">
            @foreach($posts as $post)
                
                <a href="/posts/{{$post['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <strong> {{ $post->title }}</strong>
                </a>
            @endforeach
        </ul>
    </div>
    </x-layout>
