<?php

use Src\Route;

Route::add('GET', '/studyrooms', [Controller\Site::class, 'home'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/studyrooms/signup', [Controller\Site::class, 'signup']) ->middleware('admin');
Route::add(['GET', 'POST'], '/studyrooms/login', [Controller\Site::class, 'login']);
Route::add('GET', '/studyrooms/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/studyrooms/block', [Controller\Site::class, 'block']);
//функции приложения
Route::add('GET', '/studyrooms/searchroom', [Controller\Site::class, 'searchroom']);
Route::add('GET', '/studyrooms/countarea', [Controller\Site::class, 'countarea']);
Route::add('GET', '/studyrooms/countplace', [Controller\Site::class, 'countplace']);
Route::add(['GET','POST'], '/studyrooms/adminpage', [Controller\Site::class, 'adminpage'])->middleware('admin');
Route::add(['GET','POST'], '/studyrooms/deletepage', [Controller\Site::class, 'deletepage'])->middleware('admin');
