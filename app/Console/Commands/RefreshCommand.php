<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshCommand extends Command
{
    protected $signature = 'refresh';

    protected $description = 'Переустановка приложения';

    public function handle()
    {
        $this->warn('Переустановка приложения...');

        $this->refresh();

        $this->info('Переустановка приложения завершена.');
    }

    private function refresh(): void
    {
        $this->call('migrate:refresh');
        $this->call(CreateSuperUserCommand::class);
    }

}
