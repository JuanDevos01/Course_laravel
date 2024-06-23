<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = new Post();
        $post-> title = 'titulo de prueba 3';
        $post->content = 'centenido de prueba 3';
        $post->category = 'Categoria de prueba 3';
        $post->save();

        Post::factory(100)
            ->create();
    }
}
