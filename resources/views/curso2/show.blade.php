<x-layout>
    <x-slot:heading>
     Aquí se mostrarán el post {{$post->id}}
 </x-slot:heading>
    <h1>Titulo : {{$post->title}} </h1>
    <p>Category : {{$post->category}}</p>
</x-layout>