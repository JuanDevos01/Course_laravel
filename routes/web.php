<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\JobModel;
use App\Models\Post;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = JobModel::with('employer')->latest()-> paginate(5);
    return view('jobs/index', [
        'jobs' => $jobs
    ]);
});
Route::get('/jobs/create', function(){
    return view('jobs.create');
});

Route::post('/jobs', function(){
    // validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    JobModel::create([
        'title'=> request('title'),
        'salary'=> request('salary'),
        'employer_id'=> 1,
    ]);
    return redirect('/jobs');
});

Route::get('/job/{id}', function ($id) {
    $job = App\Models\JobModel::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = App\Models\JobModel::find($id);
    return view('jobs.edit', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
////////////////////////////////////////////////////////////////

Route::get('/prueba', function(){
    // CREAR NUEVO POST
    // $post = new Post();
    // $post-> title = 'titulo de prueba 3';
    // $post->content = 'centenido de prueba 3';
    // $post->category = 'Categoria de prueba 3';
    // $post->save();
    // return $post;

    //BUSCAR DETERMINADO REGISTRO
    // $post = Post::find(1);
    //return $post;
    
    //ACTUALIZAR REGISTRO
    // $post = Post::where('title', 'Titulo de prueba')
    //     ->first();
    // $post->category = 'desarrollo web';
    // $post->save();
    // return $post;

    //MOSTRAR TODOS
    $post = Post::all();
    return $post;


    // MOSTRAR TODOS LOS REGISTROS CON UN WHERE los id mayores o iguales de 2
    // $posts = Post::where('id','>=', '2')
    //             ->get();
    // return $posts;
    //LISTAR REGISTROS CON UN WHERE ORDERBY SELECT  TAKE GET
    // $posts2 = Post::orderBy('category', 'asc')
    //             ->select('id', 'title', 'category')
    //             ->take(2)
    //             ->get();
    // return $posts2;

    //DELETE 
    // $post = Post::find(1);
    // $post->delete();
    // return "Eliminado correctamente";

});


Route::get('/homepage', [HomeController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/posts/{post}', [PostController::class, 'show']);

// Route::get('/posts/{post}/{category}', function ($post, $category) {
//     //return view('welcome');
//     return "Post {$post}. {$category}";
// });

// // en caso de que un parametro sea opcional

// Route::get('/posts2/{post}/{category?}', function ($post, $category = null) {
//     //return view('welcome');
//     if($category){
//         return "aqui hay mensaje {$post} {$category}";
//     }
//     return "Post {$post}. {$category}";
// });