<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StorageCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:count
    {path : Enter your folder name}
    {--F|--folder : Pass this is you want to count sub folders}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count Files and Folder From Your Path';

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
    
        $dir = base_path($this->argument('path')) . "/";

        $files = array_filter(glob($dir . "*"), "is_file") ?? 0;

        if($this->option('folder')){
            $folder = glob($dir . "*", GLOB_ONLYDIR) ?? 0;
            $this->info("total : " .count($files) . " Files & " . count($folder) . " Folder");
        }else{
            $this->info("total : " .count($files) . " Files");
        }

        $this->error("no Files and Folder is avilable");

    }
}
