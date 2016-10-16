<?php

namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Cleanup::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // utc -6:00  Central Time (US and Canada)
        date_default_timezone_set('US/Central');

        $logFile = storage_path() . '/cronlog.log';

        // just in case even though console script should not have problem
        ini_set('memory_limit', '-1');
        ini_set('max_input_time', '-1');
        ini_set('max_execution_time', '0');
        set_time_limit(0);

        // this speeds up things a bit
        DB::disableQueryLog();
        //////////////////////////////////////////////////////////

        // Cleanup useless temp files and cache
        $schedule->command('app:cleanup')->weekly()->appendOutputTo($logFile);
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
