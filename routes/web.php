<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class, 'index'])->name('index');
/*
 * Setup
 */
Route::get('/setup', [PagesController::class, 'setupFirstStep'])->name('setupFirstStep');
Route::post('/setupFirstStep', [PagesController::class, 'setupFirstStepCreate'])->name('setupFirstStepCreate');
Route::get('/setup-second-step', [PagesController::class, 'setupSecondStep'])->name('setupSecondStep');
Route::post('/setupSecondStep', [PagesController::class, 'setupSecondStepCreate'])->name('setupSecondStepCreate');
Route::get('/setup-third-step', [PagesController::class, 'setupThirdStep'])->name('setupThirdStep');
Route::post('/setupThirdStep', [PagesController::class, 'setupThirdStepCreate'])->name('setupThirdStepCreate');

Route::prefix('post')->group(function () {
    Route::get('/{id}-{slug}', [PostController::class, 'show'])->name('post_show');
    Route::post('/{id}/add', [PostController::class, 'store'])->name('post_add');
});
Route::prefix('user')->group(function() {
    Route::get('@{name}', [PagesController::class, 'user_show'])->name('user_show');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{id}-{slug}', [CategoryController::class, 'show'])->name('category_show');
Route::group(['prefix' => 'acp', 'middleware' => ['role:Administrator']], function () {
});
Auth::routes();
