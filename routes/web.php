<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManager;
use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('login'); // Redirect to the login page
});





Route::middleware('auth')->group(function () {


    Route::get('/dashboard', [TaskManager::class, 'dashboard'])->name('dashboard');


    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/tasks/list', [TaskManager::class, 'listTasks'])->name('tasks.list');
    Route::get('/tasks/add', [TaskManager::class, 'addTask'])->name('tasks.add');
    Route::post('/tasks/add', [TaskManager::class, 'addTaskPost'])->name('tasks.store');
    Route::get('/tasks/edit/{id}', [TaskManager::class, 'editTask'])->name('tasks.edit');
    Route::put('/tasks/update/{id}', [TaskManager::class, 'updateTask'])->name('tasks.update');
    Route::get('/tasks/delete/{id}', [TaskManager::class, 'deleteTask'])->name('tasks.delete');
    Route::get('tasks/status/{id}', [TaskManager::class,'updaeTaskStatus']) ->name('tasks.status.updated');

});
require __DIR__.'/auth.php';
