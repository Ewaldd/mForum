<?php

use App\Http\Controllers\PagesController;
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

Route::get('/', function () {
    return view('welcome');
});
/*
 * Setup
 */
Route::get('/setup', [PagesController::class, 'setupFirstStep'])->name('setupFirstStep');
Route::post('/setupFirstStep', [PagesController::class, 'setupFirstStepCreate'])->name('setupFirstStepCreate');
Route::get('/setup-second-step', [PagesController::class, 'setupSecondStep'])->name('setupSecondStep');
Route::post('/setupSecondStep', [PagesController::class, 'setupSecondStepCreate'])->name('setupSecondStepCreate');
Route::get('/setup-third-step', [PagesController::class, 'setupThirdStep'])->name('setupThirdStep');
Route::post('/setupThirdStep', [PagesController::class, 'setupThirdStepCreate'])->name('setupThirdStepCreate');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
