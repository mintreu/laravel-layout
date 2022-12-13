<?php

namespace Mintreu\LaravelLayout\Commands;

use Illuminate\Console\Command;

class LaravelLayoutCommand extends Command
{
    public $signature = 'laravel-layout';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('ReCheck In Next Version');

        return self::SUCCESS;
    }
}
