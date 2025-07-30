<?php

namespace JoshEmbling\Snooker\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID' => $this->ID,
            'Name' => $this->Name,
            'StartDate' => $this->StartDate,
            'EndDate' => $this->EndDate,
            'Sponsor' => $this->Sponsor,
            'Season' => $this->Season,
            'Type' => $this->Type,
            'Num' => $this->Num,
            'Venue' => $this->Venue,
            'City' => $this->City,
            'Country' => $this->Country,
            'Discipline' => $this->Discipline,
            'Main' => $this->Main,
            'Sex' => $this->Sex,
            'AgeGroup' => $this->AgeGroup,
            'Url' => $this->Url,
            'Related' => $this->Related,
            'Stage' => $this->Stage,
            'ValueType' => $this->ValueType,
            'ShortName' => $this->ShortName,
            'WorldSnookerId' => $this->WorldSnookerId,
            'RankingType' => $this->RankingType,
            'EventPredictionID' => $this->EventPredictionID,
            'Team' => $this->Team,
            'Format' => $this->Format,
            'Twitter' => $this->Twitter,
            'HashTag' => $this->HashTag,
            'ConversionRate' => $this->ConversionRate,
            'AllRoundsAdded' => $this->AllRoundsAdded,
            'PhotoURLs' => $this->PhotoURLs,
            'NumCompetitors' => $this->NumCompetitors,
            'NumUpcoming' => $this->NumUpcoming,
            'NumActive' => $this->NumActive,
            'NumResults' => $this->NumResults,
            'Note' => $this->Note,
            'CommonNote' => $this->CommonNote,
            'DefendingChampion' => $this->DefendingChampion,
            'PreviousEdition' => $this->PreviousEdition,
            'Tour' => $this->Tour,
        ];
    }
}
