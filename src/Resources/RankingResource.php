<?php

namespace JoshEmbling\Snooker\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RankingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID' => $this->ID,
            'Position' => $this->Position,
            'PlayerID' => $this->PlayerID,
            'Season' => $this->Season,
            'Sum' => $this->Sum,
            'Type' => $this->Type,
        ];
    }
}
