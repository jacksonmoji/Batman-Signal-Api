<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    use ApiResponse;
	
    const SUCCESS_MESSAGE = 'Action completed successfully';
    const ERROR_MESSAGE = 'Action failed';
    const PANIC_NOT_FOUND_MESSAGE = 'Panic not found';
    const PANIC_CANCELLED_SUCCESS_MESSAGE = 'Panic cancelled successfully.';
    const PANIC_RAISED_SUCCESS_MESSAGE = 'Panic raised successfully.';
    const SUCCESS_CODE = 200;
    const CREATED_SUCCESS_CODE = 201;
    const ERROR_CODE = 500;
    const NOT_FOUND_CODE = 404;

}
