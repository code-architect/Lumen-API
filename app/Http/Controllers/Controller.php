<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @param $data Data from database
     * @param int $code Success Code or Code you want to pass
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSuccessResponse($data, $code = 200)
    {
        return response()->json(['data' => $data], $code);
    }

    public function createErrorResponse($message, $code)
    {
        return response()->json(['message' => $message, 'code' => $code], $code);
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        return $this->createErrorResponse($errors, 422);
    }

}
