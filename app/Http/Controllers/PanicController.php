<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Panic\SendPanicRequest;
use App\Http\Requests\Panic\CancelPanicRequest;
use App\Services\PanicService;
 

class PanicController extends ApiController
{
    /**
     * @var PanicService
     */
    protected $panicService;

    /**
     * PanicController constructor.
     * @param PanicService $panicService
     */
    public function __construct(PanicService $panicService)
    {
        $this->panicService = $panicService;
    }

    /**
     * Store a newly created panic detail in storage.
     *
     * @param  SendPanicRequest $request
     * @return \Illuminate\Http\Response
     */
    public function sendPanic(SendPanicRequest $request)
    {
        $data = $this->panicService->createPanic($request->validated());

        return $this->respondWithSuccess(self::PANIC_RAISED_SUCCESS_MESSAGE, self::CREATED_SUCCESS_CODE, $data);
    }

    /**
     * Cancel a panic in storage.
     *
     * @param  SendPanicRequest $request
     * @return \Illuminate\Http\Response
     */
    public function cancelPanic(CancelPanicRequest $request)
    {
        $data = $this->panicService->removePanic($request->validated());
        
        if(! $data) {
            return $this->errorNotFound(self::PANIC_NOT_FOUND_MESSAGE);
        }

        return $this->respondWithSuccess(self::PANIC_CANCELLED_SUCCESS_MESSAGE, self::SUCCESS_CODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function panicHistory()
    {
        $data = $this->panicService->getPanicHistory();

        return $this->respondWithSuccess(self::SUCCESS_MESSAGE, self::SUCCESS_CODE, $data);
    }
}