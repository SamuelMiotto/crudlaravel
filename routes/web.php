<?php

use App\http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('produtos.index');
});

Route::resource('produtos', ProdutoController::class);
