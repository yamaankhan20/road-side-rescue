<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {

            return response()->view('errors.404', [], 404);
        }

        return parent::render($request, $exception);
    }
}
