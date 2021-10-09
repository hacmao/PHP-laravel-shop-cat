<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\ResponseModel;

trait ApiResponse {
    /**
     * @param $data: array()
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiSuccess($data = null): JsonResponse
    {

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @param $error_code
     * @param null $mess
     * @param int $return_code
     * @return \Illuminate\Http\JsonResponse
     * @internal param array $data
     */
    protected function apiError($mess = null, $error_code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        if(empty($mess)){
            $mess = [__('messages.error_mess.server_error')];
        } else if ( !is_array($mess)){
            $mess = [$mess];
        }

        return response()->json([
            'message' => $mess,
        ], $error_code);
    }

    /**
     * Unauthorized error
     *
     * @param null $mess
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiUnauthorized($mess = null): JsonResponse
    {
        if(empty($mess)){
            $mess = trans('auth.unauthorized');
        } elseif (!is_array($mess)){
            $mess = [$mess];
        }

        return $this->apiError($mess, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Forbidden error
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiForbidden($mess = null): JsonResponse
    {
        if(empty($mess)){
            $mess = trans('auth.forbidden');
        } elseif (!is_array($mess)){
            $mess = [$mess];
        }
        return $this->apiError($mess, Response::HTTP_FORBIDDEN);
    }

    protected function apiResponse(ResponseModel $res) {
        if ($res->http_code != Response::HTTP_OK) {
            return $this->apiError($res->msg, $res->http_code);
        } else {
            return $this->apiSuccess($res->data);
        }
    }
}
