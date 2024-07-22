<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'install';

    protected $description = 'Установка приложения';

    public function handle()
    {
        $this->warn('Установка приложения...');

        $this->install();

        $this->info('Установка приложения завершена.');
    }

    private function install(): void
    {
        $this->call('migrate');
        $this->call(CreateSuperUserCommand::class);
    }

}
