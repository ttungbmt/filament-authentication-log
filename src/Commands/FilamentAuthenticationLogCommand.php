<?php

namespace FilamentPro\FilamentAuthenticationLog\Commands;

use Illuminate\Console\Command;

class FilamentAuthenticationLogCommand extends Command
{
    public $signature = 'filament-authentication-log';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
