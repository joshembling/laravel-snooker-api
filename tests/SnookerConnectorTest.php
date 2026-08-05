<?php

use JoshEmbling\Snooker\Integrations\SnookerConnector;

it('merges the package config file', function (): void {
    expect(config('snooker-api'))->toHaveKey('requested_by');
});

it('sends the requested-by header snooker.org requires', function (): void {
    config(['snooker-api.requested_by' => 'TestApp123']);

    expect((new SnookerConnector)->headers()->get('X-Requested-By'))->toBe('TestApp123');
});

it('resolves the header without the env file, so a cached config still works', function (): void {
    // `config:cache` stops Laravel loading .env at all, so env() returns null
    // on every deployed environment. snooker.org answers 200 with an empty body
    // when the header is missing, which is why that went unnoticed for so long.
    config(['snooker-api.requested_by' => 'TestApp123']);
    unset($_ENV['SNOOKER_API_REQUESTED_BY'], $_SERVER['SNOOKER_API_REQUESTED_BY']);
    putenv('SNOOKER_API_REQUESTED_BY');

    expect(env('SNOOKER_API_REQUESTED_BY'))->toBeNull()
        ->and((new SnookerConnector)->headers()->get('X-Requested-By'))->toBe('TestApp123');
});

it('falls back to the environment when the config value is unset', function (): void {
    config(['snooker-api.requested_by' => null]);
    putenv('SNOOKER_API_REQUESTED_BY=FromEnv');

    try {
        expect((new SnookerConnector)->headers()->get('X-Requested-By'))->toBe('FromEnv');
    } finally {
        putenv('SNOOKER_API_REQUESTED_BY');
    }
});
