<?php

namespace JoshEmbling\Snooker\Commands;

use Illuminate\Console\Command;

class SnookerCommand extends Command
{
    public $signature = 'laravel-snooker-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
