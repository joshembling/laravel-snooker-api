<?php

namespace JoshEmbling\Snooker\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoundResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Round' => $this->Round,
            'RoundName' => $this->RoundName,
            'EventID' => $this->EventID,
            'MainEvent' => $this->MainEvent,
            'Distance' => $this->Distance,
            'NumLeft' => $this->NumLeft,
            'NumMatches' => $this->NumMatches,
            'Note' => $this->Note,
            'ValueType' => $this->ValueType,
            'Rank' => $this->Rank,
            'Money' => $this->Money,
            'SeedGetsHalf' => $this->SeedGetsHalf,
            'ActualMoney' => $this->ActualMoney,
            'Currency' => $this->Currency,
            'ConversionRate' => $this->ConversionRate,
            'Points' => $this->Points,
            'SeedPoints' => $this->SeedPoints,
        ];
    }
}
