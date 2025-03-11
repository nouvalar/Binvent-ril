<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\BackupDatabase::class,
        Commands\RestoreDatabase::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Backup database setiap hari jam 00:00
        $schedule->command('db:backup')
                ->daily()
                ->at('00:00')
                ->appendOutputTo(storage_path('logs/backup.log'));

        // Hapus backup yang lebih dari 30 hari
        $schedule->call(function () {
            $path = storage_path('app/backup');
            $files = glob($path . '/*.sql');
            $now = time();
            
            foreach ($files as $file) {
                if ($now - filemtime($file) >= 30 * 24 * 60 * 60) {
                    unlink($file);
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
