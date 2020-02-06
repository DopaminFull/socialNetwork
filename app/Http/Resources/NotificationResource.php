<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $sender = User::find($this->sender);
        return [
            'id' => $this->id,
            'body' => $this->body,
            'sender' => $this->sender,
            'sender_avatar' => $sender->getAvatar(),
            'receiver' => $this->receiver,
            'created_at' => $this->created_at,
            'seen_at' => $this->seen_at,
            'sender_name' => $sender->poster(),
        ];
    }
}
