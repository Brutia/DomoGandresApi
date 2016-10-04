<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helper\Gpio;

class WaitVolet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wait:volet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Permet d\'attendre que le volet soit ouvert ou fermé';

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
     * @return mixed
     */
    public function handle()
    {
        $gpio = new Gpio();

    	$gpio->setPinMode(2, "out");
    	$gpio->setPinMode(1, "out");
    	sleep(30);
    	$gpio->setPinState(2,0);
    	$gpio->setPinState(1,0);
    }
}
