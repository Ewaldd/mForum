<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
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
    Route::post('/{id}/report', [ReportController::class, 'store'])->name('report_add');
});
Route::prefix('user')->group(function() {
    Route::get('@{name}', [PagesController::class, 'user_show'])->name('user_show');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{id}-{slug}', [CategoryController::class, 'show'])->name('category_show');
Route::group(['prefix' => 'acp', 'middleware' => ['role:Administrator']], function () {
    Route::get('/', [PagesController::class, 'acp_index'])->name('acp_index');
    Route::get('/statistics', [PagesController::class, 'acp_statistics'])->name('acp_statistics');
    Route::get('/users', [PagesController::class, 'acp_users'])->name('acp_users');
    Route::group(['prefix' => 'user'], function() {
        Route::get('/@{name}', [PagesController::class,  'acp_user'])->name('acp_user');
        Route::post('/@{name}/save', [PagesController::class, 'acp_change_user_information'])->name('acp_change_user_information');
        Route::get('/@{name}/warn', [PagesController::class, 'acp_warn_user'])->name('acp_warn_user');
        Route::get('/@{name}/ban', [PagesController::class, 'acp_ban_user'])->name('acp_ban_user');
        Route::get('/@{name}/stats', [PagesController::class, 'acp_stats_user'])->name('acp_stats_user');
    });
    Route::get('/reports', [PagesController::class, 'acp_reports'])->name('acp_reports');
    Route::get('/report/{id}', [ReportController::class, 'showReport'])->name('acp_report');
    Route::post('/report/{id}/result', [ReportController::class, 'setResult'])->name('acp_set_result');
});
Auth::routes();
