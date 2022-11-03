<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migration, seeders and serve';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate');
        Artisan::call('serve');
        Artisan::call('db:seed');
    }
}
