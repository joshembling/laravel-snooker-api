<?php

namespace JoshEmbling\Snooker\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID' => $this->ID,
            'Type' => $this->Type,
            'FirstName' => $this->FirstName,
            'MiddleName' => $this->MiddleName,
            'LastName' => $this->LastName,
            'TeamName' => $this->TeamName,
            'TeamNumber' => $this->TeamNumber,
            'TeamSeason' => $this->TeamSeason,
            'ShortName' => $this->ShortName,
            'Nationality' => $this->Nationality,
            'Sex' => $this->Sex,
            'BioPage' => $this->BioPage,
            'Born' => $this->Born,
            'Twitter' => $this->Twitter,
            'SurnameFirst' => $this->SurnameFirst,
            'License' => $this->License,
            'Club' => $this->Club,
            'URL' => $this->URL,
            'Photo' => $this->Photo,
            'PhotoSource' => $this->PhotoSource,
            'FirstSeasonAsPro' => $this->FirstSeasonAsPro,
            'LastSeasonAsPro' => $this->LastSeasonAsPro,
            'Info' => $this->Info,
            'NumRankingTitles' => $this->NumRankingTitles,
            'NumMaximums' => $this->NumMaximums,
            'Died' => $this->Died,
        ];
    }
}
