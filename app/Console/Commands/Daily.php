<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Daily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:do';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Do all things for the day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('optimize:clear');
        $this->call('sitemap:generate');
        $this->call('dailyrandom:generate');
        $this->call('optimize');
    }
}
