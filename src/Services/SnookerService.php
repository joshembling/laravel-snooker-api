<?php

namespace JoshEmbling\Snooker\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use JoshEmbling\Snooker\Integrations\SnookerConnector;
use JoshEmbling\Snooker\Requests\EventMatchesRequest;
use JoshEmbling\Snooker\Requests\EventPlayerPointsRequest;
use JoshEmbling\Snooker\Requests\EventPlayersRequest;
use JoshEmbling\Snooker\Requests\EventRequest;
use JoshEmbling\Snooker\Requests\EventsBySeasonRequest;
use JoshEmbling\Snooker\Requests\MatchRequest;
use JoshEmbling\Snooker\Requests\OngoingMatchesRequest;
use JoshEmbling\Snooker\Requests\PlayerMatchesBySeasonRequest;
use JoshEmbling\Snooker\Requests\PlayerRequest;
use JoshEmbling\Snooker\Requests\PlayersRequest;
use JoshEmbling\Snooker\Requests\RankingsRequest;
use JoshEmbling\Snooker\Requests\RoundRequest;
use JoshEmbling\Snooker\Resources\EventPlayerPointsResource;
use JoshEmbling\Snooker\Resources\EventResource;
use JoshEmbling\Snooker\Resources\EventsSeasonResource;
use JoshEmbling\Snooker\Resources\MatchResource;
use JoshEmbling\Snooker\Resources\PlayerResource;
use JoshEmbling\Snooker\Resources\RankingResource;
use JoshEmbling\Snooker\Resources\RoundResource;

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

    public function eventPlayers(int $eventId): array|AnonymousResourceCollection
    {
        $request = new EventPlayersRequest($eventId);

        return $this->getResponse($request, PlayerResource::class, true);
    }

    public function eventPlayerPoints(int $eventId): array|AnonymousResourceCollection
    {
        $request = new EventPlayerPointsRequest($eventId);

        return $this->getResponse($request, EventPlayerPointsResource::class, true);
    }

    public function eventsSeason(int $season, string $tour): array|AnonymousResourceCollection
    {
        $request = new EventsBySeasonRequest($season, $tour);

        return $this->getResponse($request, EventsSeasonResource::class, true);
    }

    public function match(int $eventId, int $roundId, int $matchNumber): MatchResource
    {
        $request = new MatchRequest($eventId, $roundId, $matchNumber);

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

    public function players(string $status, int $season, string $gender): array|AnonymousResourceCollection
    {
        $request = new PlayersRequest($status, $season, $gender);

        return $this->getResponse($request, PlayerResource::class, true);
    }

    public function playerMatchesBySeason(int $playerId, int $season, string $tour): array|AnonymousResourceCollection
    {
        $request = new PlayerMatchesBySeasonRequest($playerId, $season, $tour);

        return $this->getResponse($request, MatchResource::class, true);
    }

    public function rankings(string $rankingType, int $season): array|AnonymousResourceCollection
    {
        $request = new RankingsRequest($rankingType, $season);

        return $this->getResponse($request, RankingResource::class, true);
    }

    public function rounds(int $eventId, int $season): array|AnonymousResourceCollection
    {
        $request = new RoundRequest($eventId, $season);

        return $this->getResponse($request, RoundResource::class, true);
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
