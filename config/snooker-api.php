<?php

return [
    'providers' => [
        // ...
        JoshEmbling\Snooker\SnookerServiceProvider::class,
    ],

    'aliases' => [
        // ...
        'Snooker' => JoshEmbling\Snooker\Facades\Snooker::class,
    ],
];
