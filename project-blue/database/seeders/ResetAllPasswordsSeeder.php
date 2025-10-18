<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetAllPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Updates all user passwords to '123' (hashed).
     *
     * @return void
     */
    public function run()
    {
        // Update all users with password '123' (hashed)
        User::query()->update([
            'password' => Hash::make('123'),
        ]);

        $count = User::query()->count();
        $this->command->info("✓ Updated {$count} user(s) with password '123' (hashed).");
    }
}
