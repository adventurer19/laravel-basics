<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hello {name} {age}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Print name and age.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieving Input
        $age = $this->argument('age');
        $name = $this->argument('name');
        // Log arguments.
        $this->info("Name: $name age: $age");
    }
}
