<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PanicResource extends JsonResource
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'panic';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'panic_type' => $this->panic_type,
            'details' => $this->details,
            'created_at' => date_format($this->created_at,"Y/m/d"), 
            'created_by' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email
            ]
        ];
    }
}
