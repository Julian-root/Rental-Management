<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\TypeArticleComp;
use App\Http\Livewire\ArticleComp;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Le groupe des routes relatives uniquement aux administrateurs
Route::group([
    "middleware" => ["auth", "auth.admin"],
    "as" => "admin."

], function(){

    Route::group([
        "prefix" => "habilitations",
        "as" => "habilitations."
    
    ], function(){
            Route::get('/utilisateurs', Utilisateurs::class, 'index')->name('users.index');
    });

    Route::group([
        "prefix" => "gestarticles",
        "as" => "gestarticles."
    
    ], function(){
            Route::get('/typearticles', TypeArticleComp::class, 'index')->name('typearticles');
            Route::get('/articles', ArticleComp::class)->name('articles');
    });
});



