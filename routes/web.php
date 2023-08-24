<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
 * Appends routes are used with feedback page
 */
Route::get('/feedback', [Controllers\FeedbackController::class, "index"]);
Route::post('/feedback/create', [Controllers\FeedbackController::class, "create"]);
