<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mytaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Add task
Route::get('/addTask',[App\Http\Controllers\mytaskController::class,'addtaskFunction']);

//Store task
Route::post('/storeTask',[App\Http\Controllers\mytaskController::class,'storeTaskFunction']);

//View task
Route::get('/viewTask',[App\Http\Controllers\mytaskController::class,'viewTaskFunction']);

// Edit Task View
Route::get('/editTask',[App\Http\Controllers\mytaskController::class,'editTaskFunction']);

// Delete Task
Route::get('/deleteTask/{id}',[App\Http\Controllers\mytaskController::class,'deleteTaskFunction']);

// Show Update Form
Route::get('/updateTask/{id}',[App\Http\Controllers\mytaskController::class,'updateTaskForm']);

// Update Task
Route::post('/updateTask/{id}',[App\Http\Controllers\mytaskController::class,'updateTaskFunction']);