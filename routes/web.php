<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use App\Models\JobModel;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;



Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])-> middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])
            ->middleware('auth')
            ->can('edit-job', 'job');
Route::patch('/jobs/{id}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
//Todo esto se puede hacer con este resource por si solo
// Route::resource('jobs', JobController::class);




Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/contact', function () {
    return view('contact');
});
//Forma mas resummida si es view
Route::view('/contact', 'contact');
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