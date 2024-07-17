<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\http\Middleware\TokenMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [UserController::class, 'login']);

Route::middleware([TokenMiddleware::class])->group(function () {
    Route::post('users', [UserController::class, 'register']);
    Route::apiResource('blogs', BlogController::class);

    Route::prefix('blogs/{blogId}')->group(function () {
        Route::apiResource('posts', PostController::class)->scoped([
            'post' => 'id'
        ]);

        Route::prefix('posts/{postId}')->group(function () {
            Route::post('comments', [CommentController::class, 'store']);
            Route::delete('comments/{commentId}', [CommentController::class, 'destroy']);

            Route::post('likes', [LikeController::class, 'store']);
            Route::delete('likes/{likeId}', [LikeController::class, 'destroy']);
        });
    });
});
