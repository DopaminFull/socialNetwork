<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
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
            'id' => $this->id,
            'body' => $this->body,
            'user_id' => $this->user_id,
            'poster_name' => $this->user->poster(),
            'poster_avatar' => $this->user->getAvatar(),
            'created' => $this->created_at->diffForHumans()
        ];
    }
}
