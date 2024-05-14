<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Chat;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/chat', function () {
////    return view('welcome');
//    $response = app('openai')->chat()->create([
//        'model' => 'gpt-4o',
//        'messages' => [
//            ['role' => 'system', 'content' => 'You are a friendly bot to help with web development.'],
//            ['role' => 'user', 'content' => 'Link me to the Laravel docs'],
//        ]
//    ]);
//
//    dd($response);
//});

Route::get('/chat', Chat::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
