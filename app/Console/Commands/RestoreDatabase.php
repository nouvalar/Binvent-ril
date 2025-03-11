<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RestoreDatabase extends Command
{
    protected $signature = 'db:restore {filename}';
    protected $description = 'Restore database PostgreSQL dari file SQL';

    protected function findPostgresPath()
    {
        $possiblePaths = [
            'C:\\Program Files\\PostgreSQL\\16\\bin\\psql.exe',
            'C:\\Program Files\\PostgreSQL\\15\\bin\\psql.exe',
            'C:\\Program Files\\PostgreSQL\\14\\bin\\psql.exe',
            'C:\\Program Files (x86)\\PostgreSQL\\16\\bin\\psql.exe',
            'C:\\Program Files (x86)\\PostgreSQL\\15\\bin\\psql.exe',
            'C:\\Program Files (x86)\\PostgreSQL\\14\\bin\\psql.exe'
        ];

        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        throw new \Exception('PostgreSQL psql tidak ditemukan. Pastikan PostgreSQL terinstall dan tambahkan path yang sesuai.');
    }

    public function handle()
    {
        try {
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

            // Cari path PostgreSQL
            $psqlPath = $this->findPostgresPath();
            
            // Command untuk restore PostgreSQL di Windows
            $command = sprintf(
                'set PGPASSWORD=123 && "%s" -h %s -U %s -d %s -f "%s"',
                $psqlPath,
                config('database.connections.pgsql.host'),
                config('database.connections.pgsql.username'),
                config('database.connections.pgsql.database'),
                $path
            );

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