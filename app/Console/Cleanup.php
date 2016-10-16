<?php
/**
 * Created by PhpStorm.
 * User: Sarfraz
 * Date: 10/16/2016
 * Time: 2:11 PM
 */

namespace App\Console;

use Artisan;
use File;
use Illuminate\Console\Command;

class Cleanup extends Command
{
    protected $signature = 'app:cleanup';
    protected $description = 'Cleans useless data and cache files.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->cleanClockworkDir();
        $this->deleteCache();

        out('Cleanup Done!');
    }

    protected function cleanClockworkDir()
    {
        File::cleanDirectory(storage_path('clockwork'));

        // re-create .gitignore file
        @file_put_contents(storage_path('clockwork') . '/.gitignore', '*.json');
    }

    protected function deleteCache()
    {
        Artisan::call('clear-compiled');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
    }
}