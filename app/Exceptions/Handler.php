<?php

namespace App\Exceptions;

use Throwable;
use App\Traits\ApiResponse;
use Whoops\Exception\ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof QueryException){
            return $this->errorResponse($exception->getMessage(),500);
        }
        if($exception instanceof NotFoundHttpException){
            return $this->errorResponse('The specified URL cannot be found',404);
        }
        if($exception instanceof MethodNotAllowedHttpException){
            return $this->errorResponse($exception->getMessage(),405);
        }
        // if($exception instanceof ErrorException){
        //     return $this->errorResponse($exception->getMessage(),405);
        // }
        if(config('app.debug')) {
            return parent::render($request, $exception);
            }
            return $this->errorResponse('Unexpected Exception. Try later',500);
    }
}