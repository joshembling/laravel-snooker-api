<?php

namespace JoshEmbling\Snooker\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use JoshEmbling\Snooker\Integrations\SnookerConnector;
use JoshEmbling\Snooker\Requests\EventMatchesRequest;
use JoshEmbling\Snooker\Requests\EventRequest;
use JoshEmbling\Snooker\Requests\EventsSeasonRequest;
use JoshEmbling\Snooker\Requests\MatchRequest;
use JoshEmbling\Snooker\Requests\OngoingMatchesRequest;
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

    public function event(int $eventId): EventResource
    {
        $request = new EventRequest($eventId);

        return $this->getResponse($request, EventResource::class);
    }

    public function eventMatches(int $eventId): array|AnonymousResourceCollection
    {
        $request = new EventMatchesRequest($eventId);

        return $this->getResponse($request, MatchResource::class, true);
    }

    public function eventsSeason(int $seasonId, string $tour): array|AnonymousResourceCollection
    {
        $request = new EventsSeasonRequest($seasonId, $tour);

        return $this->getResponse($request, EventsSeasonResource::class, true);
    }

    public function match(int $eventId, int $roundId, int $matchNumber): MatchResource
    {
        $request = new MatchRequest(
            eventId: $eventId,
            roundId: $roundId,
            matchNumber: $matchNumber
        );

        return $this->getResponse($request, MatchResource::class);
    }

    public function ongoingMatches(string $tour): array|AnonymousResourceCollection
    {
        $request = new OngoingMatchesRequest($tour);

        return $this->getResponse($request, MatchResource::class);
    }

    public function player(int $playerId): PlayerResource
    {
        $request = new PlayerRequest($playerId);

        return $this->getResponse($request, PlayerResource::class);
    }

    private function getResponse($request, $resource, $collection = false): array|AnonymousResourceCollection|JsonResource
    {
        $response = $this->connector->send($request);

        if (empty(json_decode($response->body(), true))) {
            return [];
        }

        if ($collection) {
            return $resource::collection($response->json());
        }

        return new $resource($response->json()[0]);
    }
}
