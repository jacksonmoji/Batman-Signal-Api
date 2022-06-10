<?php

namespace App\Services;

use Exception;
use App\Models\Panic;
use App\http\Resources\PanicResource;
use App\http\Resources\PanicCollection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponse;


class PanicService
{
    private $panic;

    public function __construct(Panic $panic) {
        $this->panic = $panic;
    }
    
    public function createPanic($data)
    {
        $user = auth()->user();

        $panic = new PanicResource($user->panics()->create($data));

        Log::info(sprintf('Panic %u raised by user with ID %s ',$panic->id, $user->id));

        return $this->dataItemTransformer('panic_id', $panic->id);
    }

    public function getPanicHistory()
    {
        return new PanicCollection(Panic::all());
    }

    public function removePanic($id)
    {
        
        if(!$data = $this->getPanicById($id)){
            return False;
        }

        $panic = $data->id;

        $data->delete();

        Log::info(sprintf('Panic %u was canceled by user with ID %s ',$panic, $this->getUserId()));

        return True;

    }

    public function getPanicById($id){
        return $this->panic->find($id)->first();
    }

    public function getUserId(){
        return auth()->user()->id;
    }

    public function dataItemTransformer($key,$value){
        return [ $key => $value ];
    }

}
