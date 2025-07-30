<?php

namespace JoshEmbling\Snooker\Integrations;

use Saloon\Http\Connector;

class SnookerConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://api.snooker.org';
    }

    protected function defaultHeaders(): array
    {
        return [
            'X-Requested-By' => env('SNOOKER_API_REQUESTED_BY'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
