<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MoonShine\Models\MoonshineUser;

class CreateSuperUserCommand extends Command
{
    protected $signature = 'create-super-user';

    protected $description = 'Создание суперпользователя панели администрирования';

    public function handle()
    {
        $this->warn('Создание суперпользователя панели администрирования...');

        $this->createSuperUser();

        $this->info('Суперпользователь создан.');
    }

    private function createSuperUser(): void
    {
        MoonshineUser::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@admin.com'),
            'name' => 'Admin',
        ]);
    }
}
