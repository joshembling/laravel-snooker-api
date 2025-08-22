<?php

namespace JoshEmbling\Snooker\Requests;

use Illuminate\Support\Str;
use JoshEmbling\Snooker\Integrations\SnookerConnector;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class RoundRequest extends Request
{
    protected ?string $connector = SnookerConnector::class;

    protected Method $method = Method::GET;

    public function __construct(protected int $eventId, protected int $season) {}

    public function resolveEndpoint(): string
    {
        return Str::of('/')
            ->append('?')
            ->append(http_build_query([
                't' => 10,
                'e' => $this->eventId,
                's' => $this->season,
            ]))
            ->toString();
    }
}
