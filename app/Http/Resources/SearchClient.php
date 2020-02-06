<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchClient extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "user_id" => $this->id,
            "name" => $this->fullName(),
            "avatar" => $this->getAvatar(),
            "profile" => $this->profile()
        ];
    }
}
