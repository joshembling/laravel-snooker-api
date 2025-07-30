<?php

namespace JoshEmbling\Snooker\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use JoshEmbling\Snooker\Integrations\SnookerConnector;

class PlayerRequest extends Request
{
    protected ?string $connector = SnookerConnector::class;

    protected Method $method = Method::GET;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return "/?p={$this->id}";
    }
}
