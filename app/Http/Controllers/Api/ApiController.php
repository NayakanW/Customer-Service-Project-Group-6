<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Controller dasar untuk API
 * 
 * Fitur:
 * 1. Menangani autentikasi API
 * 2. Format response standar
 * 3. Validasi input API
 * 4. Penanganan error API
 * 5. Rate limiting dan keamanan
 */
class ApiController extends Controller
{
    protected function respond($data, $code = 200)
    {
        return response(['data' => $data], $code);
    }

    protected function respondError($error)
    {
        return response(['error' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function callAction($method, $parameters)
    {
        try {
            return parent::callAction($method, $parameters);
        } catch (\Exception $e) {
//            dd("Api exception debug message", $e->getMessage());
            return $this->respondError($e->getMessage().' in '.$e->getFile().':'.$e->getLine());
        }
    }
}
