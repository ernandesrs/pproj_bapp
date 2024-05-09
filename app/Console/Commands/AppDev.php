<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AppDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dev {--fresh : refresh database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->option('fresh')) {
            $this->call('migrate:fresh');
            $this->info('Database cleared!');
        }

        $seeders = [
            'UserSeeder'
        ];

        // create super
        $super = User::create([
            'first_name' => 'Super',
            'last_name' => 'User',
            'username' => 'superuser',
            'gender' => 'm',
            'photo' => null,
            'email' => 'super@mail.com',
            'password' => \Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => \Str::random(10),
        ]);
        $this->info('');
        $this->info('Super user created');

        // create admin
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'adminuser',
            'gender' => 'm',
            'photo' => null,
            'email' => 'admin@mail.com',
            'password' => \Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => \Str::random(10),
        ]);
        $this->info('');
        $this->info('Admin user created');

        $this->info('');
        $this->info('Runing seeders ');
        foreach ($seeders as $seeder) {
            $this->call('db:seed', [
                '--class' => $seeder
            ]);
        }
    }
}
