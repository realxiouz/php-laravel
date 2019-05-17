<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // dump(get_class($e));
        // dump($e);
        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                'status' => 1,
                'msg' => 'not found error'
            ]);
        }
        if ($e instanceof AuthenticationException) {
            return response()->json([
                'status' => 1,
                'msg' => 'auth error',
                'code' => 403
            ]);
        }
        if ($e instanceof ValidationException) {
            return response()->json([
                'status' => 1,
                'msg' => 'validate error'
            ]);
        }
        return response()->json([
            'status' => 1,
            'msg' => 'server error'
        ]);
        
        return parent::render($request, $e);
    }
}
