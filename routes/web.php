<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Response;

Route::get('/api-docs.json', function () {
    $path = storage_path('api-docs/api-docs.json');
    if (!file_exists($path)) {
        abort(404, 'API docs not found');
    }
    return Response::file($path, ['Content-Type' => 'application/json']);
});