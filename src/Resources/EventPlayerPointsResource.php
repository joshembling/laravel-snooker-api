<?php

namespace JoshEmbling\Snooker\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventPlayerPointsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Player' => $this->Player,
            'Points' => $this->Points,
        ];
    }
}
