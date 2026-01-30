<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-super-admin';

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
        // Pulling from config instead of env
        $adminData = config('auth.superadmin');

        if (empty($adminData['email']) || empty($adminData['password'])) {
            $this->error("Superadmin credentials are not set in the .env file!");
            return;
        }

        if (User::where('email', $adminData['email'])->exists()) {
            $this->warn("User {$adminData['email']} already exists.");
            return;
        }

        User::create([
            'name'     => $adminData['name'],
            'email'    => $adminData['email'],
            'password' => Hash::make($adminData['password']),
            'email_verified_at'        => Date::now(),
        ]);

        $this->info("Superadmin account created for {$adminData['email']}.");
    }
}
