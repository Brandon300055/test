<?php

namespace App\Console\Commands;

use App\Library\Data\GetData;
use Illuminate\Console\Command;

class refresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes table';

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
        echo "Refreshing the Table From Live Data:";
        GetData::refresh();
        echo "\n Data Refreshed! \n ";
        return 0;
    }
}
