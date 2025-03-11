<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RestoreDatabase extends Command
{
    protected $signature = 'db:restore {filename}';
    protected $description = 'Restore database PostgreSQL dari file SQL';

    public function handle()
    {
        $filename = $this->argument('filename');
        $path = storage_path('app/backup/' . $filename);

        if (!file_exists($path)) {
            $this->error('File backup tidak ditemukan!');
            return;
        }

        // Konfirmasi dari user
        if (!$this->confirm('PERINGATAN: Restore akan menimpa database yang ada. Lanjutkan?')) {
            $this->info('Operasi restore dibatalkan.');
            return;
        }

        // Path ke PostgreSQL bin directory di Windows
        $psqlPath = 'C:\\Program Files\\PostgreSQL\\16\\bin\\psql.exe';
        
        // Command untuk restore PostgreSQL di Windows
        $command = sprintf(
            'set PGPASSWORD=123 && "%s" -h %s -U %s -d %s -f "%s"',
            $psqlPath,
            config('database.connections.pgsql.host'),
            config('database.connections.pgsql.username'),
            config('database.connections.pgsql.database'),
            $path
        );

        try {
            $this->info('Memulai proses restore...');
            $this->info('Command yang dijalankan: ' . $command);
            
            exec($command, $output, $returnCode);
            
            if ($returnCode === 0) {
                $this->info('Database berhasil direstore dari: ' . $filename);
                $this->info('Proses restore selesai!');
            } else {
                $this->error('Restore gagal dengan kode error: ' . $returnCode);
                $this->error('Output: ' . implode("\n", $output));
            }
        } catch (\Exception $e) {
            $this->error('Restore database gagal: ' . $e->getMessage());
        }
    }
} 