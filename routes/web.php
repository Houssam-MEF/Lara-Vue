<?php

use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SubjectController;
use App\Models\Subject;
use App\Http\Controllers\ContactController;


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
    $subjects = Subject::all(); 
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'subjects' => $subjects
    ]);
});

Route::middleware(['auth'])->get('/subjects/add', function () {
    return Inertia::render('Subjects/AddSubject');
})->name('subjects.add');

// Route to handle the AddSubject action (only accessible by authenticated users)
Route::middleware(['auth'])->post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');


Route::get('/subjects/xampp', function () {
    return Inertia::render('Subjects/Xampp');
});

Route::get('/subjects/laravel', function () {
    return Inertia::render('Subjects/Laravel');
});

Route::get('/subjects/vuejs', function () {
    return Inertia::render('Subjects/Vuejs');
});

Route::post('/contact', [ContactController::class, 'send']);

Route::get('/comments/{subject_id}', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);

// add subject route

//Route::get('/', [SubjectController::class, 'index']);
//Route::resource('subjects', SubjectController::class);

// Route::get('/subjects/{label}', [SubjectController::class, 'show']);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});
