<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('newsletter', NewsletterController::class);


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
//->where('post','[A-z_\-]+');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login', [SessionsController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [SessionsController::class, 'destroy']);
    Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
});

Route::group(['prefix' => 'admin/', 'middleware' => 'can:admin'], function () {
    Route::get('posts', [AdminPostController::class, 'index']);
    Route::get('posts/create', [AdminPostController::class, 'create']);
    Route::post('posts', [AdminPostController::class, 'store']);
    Route::get('posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('posts/{post}', [AdminPostController::class, 'destroy']);
});
/*
 * OR following code...
 *
Route::middleware('can:admin')->group(function (){
   Route::resource('admin/posts',AdminPostController::class)->except('show');
});

*/
