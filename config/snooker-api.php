<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Requested By
    |--------------------------------------------------------------------------
    |
    | snooker.org requires every request to identify the calling application
    | through an `X-Requested-By` header. Requests without it are answered with
    | HTTP 200 and an empty body rather than an error, so a missing value looks
    | exactly like a tournament with no draw.
    |
    | This must be resolved through config rather than a bare `env()` call:
    | Laravel skips loading the `.env` file entirely once `config:cache` has
    | run, so `env()` returns null on every deployed environment.
    |
    */

    'requested_by' => env('SNOOKER_API_REQUESTED_BY'),

];
