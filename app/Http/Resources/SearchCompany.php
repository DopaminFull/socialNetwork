<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchCompany extends JsonResource
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
            "name" => $this->company->sigle,
            "url_pic" => $this->picUrl(),
            "profile" => $this->profile()
        ];
    }
}
