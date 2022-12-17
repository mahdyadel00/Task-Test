<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function success($data)
    {
        return response()->json($data, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error($message, $code = 404)
    {
        abort($code, $message);
    }

    /**
     * return no content response.
     *
     * @return \Illuminate\Http\Response
     */
    public function noContent()
    {
        return response()->noContent();
    }
}
