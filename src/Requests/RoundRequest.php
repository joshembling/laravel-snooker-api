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

    public function __construct(protected int $season, protected ?int $eventId = null) {}

    public function resolveEndpoint(): string
    {
        if (! $this->eventId) {
            $query = [
                't' => 12,
                's' => $this->season,
            ];
        } else {
            $query = [
                't' => 12,
                'e' => $this->eventId,
                's' => $this->season,
            ];
        }

        return Str::of('/')
            ->append('?')
            ->append(http_build_query($query))
            ->toString();
    }
}
