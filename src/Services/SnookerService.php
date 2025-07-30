<?php

namespace JoshEmbling\Snooker\Services;

use JoshEmbling\Snooker\Integrations\SnookerConnector;
use JoshEmbling\Snooker\Requests\EventMatchesRequest;
use JoshEmbling\Snooker\Requests\EventRequest;
use JoshEmbling\Snooker\Requests\EventsSeasonRequest;
use JoshEmbling\Snooker\Requests\MatchRequest;
use JoshEmbling\Snooker\Requests\PlayerRequest;
use JoshEmbling\Snooker\Resources\EventResource;
use JoshEmbling\Snooker\Resources\EventsSeasonResource;
use JoshEmbling\Snooker\Resources\MatchResource;
use JoshEmbling\Snooker\Resources\PlayerResource;

class SnookerService
{
    protected SnookerConnector $connector;

    public function __construct()
    {
        $this->connector = new SnookerConnector;
    }

    public function event(int|string $id)
    {
        $request = new EventRequest($id);

        $response = $this->connector->send($request);

        return new EventResource((object) $response->json()[0]);
    }

    public function eventMatches(int|string $id)
    {
        $request = new EventMatchesRequest($id);

        $response = $this->connector->send($request);

        return MatchResource::collection($response->json());
    }

    public function eventsSeason(int|string $season, string $tour)
    {
        $request = new EventsSeasonRequest($season, $tour);

        $response = $this->connector->send($request);

        return EventsSeasonResource::collection($response->json());
    }

    public function match(int|string $eventId, int|string $roundId, int|string $matchNumber)
    {
        $request = new MatchRequest(
            eventId: $eventId,
            roundId: $roundId,
            matchNumber: $matchNumber
        );

        $response = $this->connector->send($request);

        return new MatchResource((object) $response->json()[0]);
    }

    public function player(int|string $id)
    {
        $request = new PlayerRequest($id);

        $response = $this->connector->send($request);

        return new PlayerResource((object) $response->json()[0]);
    }
}
