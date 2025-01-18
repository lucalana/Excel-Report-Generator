<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Example extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A simple example command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
