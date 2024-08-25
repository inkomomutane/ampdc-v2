<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Caddy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'caddy:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run server using server (frankenphp/caddy)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting server...');
        exec( base_path(). '/frankenphp run');
        $this->info('Server started on http://localhost:8080');
    }
}
