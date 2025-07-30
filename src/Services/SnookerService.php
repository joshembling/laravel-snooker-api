<?php

namespace JoshEmbling\Snooker\Services;

use Illuminate\Support\Facades\Event;
use JoshEmbling\Snooker\Integrations\SnookerConnector;
use JoshEmbling\Snooker\Requests\EventRequest;
use JoshEmbling\Snooker\Requests\PlayerRequest;
use JoshEmbling\Snooker\Resources\EventResource;
use JoshEmbling\Snooker\Resources\PlayerResource;

class SnookerService
{
    protected SnookerConnector $connector;

    public function __construct()
    {
        $this->connector = new SnookerConnector();
    }

    public function event(int|string $id)
    {
        $request = new EventRequest($id);

        $response = $this->connector->send($request);

        return (new EventResource((object) $response->json()[0]))->toArray(request());


        //return EventResource::collection(collect($response->json()))->toArray(request());
    }

    public function player(int|string $id)
    {
        $request = new PlayerRequest($id);

        $response = $this->connector->send($request);

        return (new PlayerResource((object) $response->json()[0]))->toArray(request());
    }
}
