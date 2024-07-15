<?php

namespace Christopheredjohnson\LaravelFileParser\Commands;

use Illuminate\Console\Command;

class LaravelFileParserCommand extends Command
{
    public $signature = 'laravel-file-parser';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
