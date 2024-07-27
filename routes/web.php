<?php

use App\Http\Controllers\RepoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/repos', [RepoController::class, 'index']);
Route::get('/get-repos', [RepoController::class, 'getRepos']);

