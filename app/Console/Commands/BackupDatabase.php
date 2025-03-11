<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BackupDatabase extends Command
{
    protected $signature = 'db:backup';
    protected $description = 'Backup database PostgreSQL ke file SQL';

    protected function findPostgresPath()
    {
        $possiblePaths = [
            'C:\\Program Files\\PostgreSQL\\16\\bin\\pg_dump.exe',
            'C:\\Program Files\\PostgreSQL\\15\\bin\\pg_dump.exe',
            'C:\\Program Files\\PostgreSQL\\14\\bin\\pg_dump.exe',
            'C:\\Program Files (x86)\\PostgreSQL\\16\\bin\\pg_dump.exe',
            'C:\\Program Files (x86)\\PostgreSQL\\15\\bin\\pg_dump.exe',
            'C:\\Program Files (x86)\\PostgreSQL\\14\\bin\\pg_dump.exe'
        ];

        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        throw new \Exception('PostgreSQL pg_dump tidak ditemukan. Pastikan PostgreSQL terinstall dan tambahkan path yang sesuai.');
    }

    public function handle()
    {
        try {
            // Cari path PostgreSQL
            $pgDumpPath = $this->findPostgresPath();
            
            // Nama file backup
            $filename = "backup-" . Carbon::now()->format('Y-m-d-H-i-s') . ".sql";
            
            // Path untuk menyimpan backup
            $path = storage_path('app/backup/');
            
            // Buat direktori jika belum ada
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            // Buat file temporary untuk pgpass
            $pgpassFile = storage_path('app/backup/.pgpass');
            file_put_contents($pgpassFile, "127.0.0.1:5432:db_stok:postgres:123");
            chmod($pgpassFile, 0600);

            // Set environment variable untuk PGPASSFILE
            putenv("PGPASSFILE=" . $pgpassFile);
            
            // Command untuk backup PostgreSQL di Windows
            $command = sprintf(
                '"%s" -h %s -U %s -d %s -F p -f "%s"',
                $pgDumpPath,
                config('database.connections.pgsql.host'),
                config('database.connections.pgsql.username'),
                config('database.connections.pgsql.database'),
                $path . $filename
            );

            $this->info('Memulai proses backup...');
            $this->info('Command yang dijalankan: ' . $command);
            
            exec($command, $output, $returnCode);
            
            if ($returnCode === 0) {
                $this->info('Database berhasil dibackup ke: ' . $path . $filename);
                
                // Tambahkan informasi ukuran file
                if (file_exists($path . $filename)) {
                    $size = round(filesize($path . $filename) / 1024 / 1024, 2); // Convert to MB
                    $this->info("Ukuran file backup: {$size} MB");
                }
            } else {
                $this->error('Backup gagal dengan kode error: ' . $returnCode);
                $this->error('Output: ' . implode("\n", $output));
            }

            // Hapus file pgpass temporary
            unlink($pgpassFile);
        } catch (\Exception $e) {
            // Hapus file pgpass temporary jika terjadi error
            if (file_exists($pgpassFile)) {
                unlink($pgpassFile);
            }
            $this->error('Backup database gagal: ' . $e->getMessage());
        }
    }
} 