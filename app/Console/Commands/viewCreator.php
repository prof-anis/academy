<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class viewCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creates a view file';

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
        $rr=['ff','rrr','rr','rews'];
       $ff= $this->output->createProgressBar(count($rr));
       foreach ($rr as $key => $value) {
           $yop=$value;
       }
        exit();
        $sample=dirname(dirname(dirname(dirname(__FILE__))))."/resources/views/client/try.blade.php";
        $content=file_get_contents($sample);
        if(file_put_contents(dirname(dirname(dirname(dirname(__FILE__))))."/resources/views/client/".$this->argument('name').".blade.php", $content))
        {
            $this->info('done successfully!');
        }

    }
}
