<?php

namespace JoshEmbling\Snooker\Requests;

use Illuminate\Support\Str;
use JoshEmbling\Snooker\Integrations\SnookerConnector;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\HasTimeout;

class EventPlayerPointsRequest extends Request
{
    use HasTimeout;

    protected ?string $connector = SnookerConnector::class;

    protected Method $method = Method::GET;

    protected int $connectTimeout = 10;

    protected int $requestTimeout = 60;

    public function __construct(protected int $eventId) {}

    public function resolveEndpoint(): string
    {
        return Str::of('/')
            ->append('?')
            ->append(http_build_query([
                't' => 21,
                'e' => $this->eventId,
            ]))
            ->toString();
    }
}
