<?php

namespace JoshEmbling\Snooker\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID' => $this->ID,
            'EventID' => $this->EventID,
            'Round' => $this->Round,
            'Number' => $this->Number,
            'Player1ID' => $this->Player1ID,
            'Score1' => $this->Score1,
            'Walkover1' => $this->Walkover1,
            'Player2ID' => $this->Player2ID,
            'Score2' => $this->Score2,
            'Walkover2' => $this->Walkover2,
            'WinnerID' => $this->WinnerID,
            'Unfinished' => $this->Unfinished,
            'OnBreak' => $this->OnBreak,
            'Status' => $this->Status,
            'WorldSnookerID' => $this->WorldSnookerID,
            'LiveUrl' => $this->LiveUrl,
            'DetailsUrl' => $this->DetailsUrl,
            'PointsDropped' => $this->PointsDropped,
            'ShowCommonNote' => $this->ShowCommonNote,
            'Estimated' => $this->Estimated,
            'Type' => $this->Type,
            'TableNo' => $this->TableNo,
            'VideoURL' => $this->VideoURL,
            'InitDate' => $this->InitDate,
            'ModDate' => $this->ModDate,
            'StartDate' => $this->StartDate,
            'EndDate' => $this->EndDate,
            'ScheduledDate' => $this->ScheduledDate,
            'FrameScores' => $this->FrameScores,
            'Sessions' => $this->Sessions,
            'Note' => $this->Note,
            'ExtendedNote' => $this->ExtendedNote,
            'HeldOver' => $this->HeldOver,
            'StatsURL' => $this->StatsURL,
        ];
    }
}
