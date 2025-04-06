<?php

namespace App\Console\Commands;

use App\Services\xlsx\MainXLSXService;
use Illuminate\Console\Command;

class dev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = (new MainXLSXService(__DIR__ . '/../../../testFile.xlsx'))->getValues(false);
        dd($file);
        
    }
}
