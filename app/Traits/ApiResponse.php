<?php

namespace App\Traits;

trait ApiResponse{

    protected function respond($status = null, $message = null, $code = 200, $data = null)
	{
		return response()->json([
			'status' => $status,
			'message' => $message,
			'data' => $data ? $data : '{}'
		], $code);
	}

	protected function respondWithSuccess($message, $code, $data = null)
	{
		return $this->respond('success', $message, $code, $data);
	}

	protected function respondWithError($message, $code, $data = null)
	{
		return $this->respond('error', $message, $code, $data);
	}

	protected function errorValidation($error)
	{
		return $this->respondWithError('validation failure', 422, $error);
	}

	protected function errorNotFound($message = 'Not Found')
    {
        return $this->respondWithError($message, 404);
    }

	protected function errorUnauthorized($message = 'Unauthorized')
	{
		return $this->respondWithError($message, 401);
	}

	protected function errorForbidden($message = 'Forbidden')
	{
		return $this->respondWithError($message, 403);
	}

	protected function errorMethodNotAllowed($message = 'Method Not Allowed')
	{
		return $this->respondWithError($message, 405);
	}

	protected function errorInternalError($message = 'Internal Error')
	{
		return $this->respondWithError($message, 500);
	}

}