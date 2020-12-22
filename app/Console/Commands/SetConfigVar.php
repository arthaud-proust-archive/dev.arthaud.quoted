<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ConfigController;

class SetConfigVar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'configvar:set {key} {value=null}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set configuration variable value';

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
        $key = $this->argument('key');
        $value = $this->argument('value');
        ConfigController::set($key, $value);
    }
}
