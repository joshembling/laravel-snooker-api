<?php

namespace JoshEmbling\Snooker\Integrations;

use Saloon\Http\Connector;

class SnookerConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://api.snooker.org';
    }

    /**
     * snooker.org answers 200 with an empty body when `X-Requested-By` is
     * missing, so a null value here is indistinguishable from a tournament with
     * no draw. It is read from config rather than `env()` because Laravel stops
     * loading the `.env` file once `config:cache` has run, which silently
     * stripped the header on every deployed environment.
     *
     * @return array<string, string|null>
     */
    protected function defaultHeaders(): array
    {
        return [
            'X-Requested-By' => config('snooker-api.requested_by') ?? env('SNOOKER_API_REQUESTED_BY'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
