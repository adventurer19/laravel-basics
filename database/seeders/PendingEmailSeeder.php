<?php

namespace Database\Seeders;

use App\Models\PendingEmail;
use Illuminate\Database\Seeder;

class PendingEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert multiple records into the pending_emails table
        PendingEmail::create([
            'email' => 'user1@example.com',
            'subject' => 'Welcome to Our Platform!',
            'body' => 'Hello, welcome to our platform! We hope you enjoy your experience.',
            'status' => 'pending',
        ]);

        PendingEmail::create([
            'email' => 'user2@example.com',
            'subject' => 'Your Account Activation',
            'body' => 'Please click the link to activate your account.',
            'status' => 'pending',
        ]);

        PendingEmail::create([
            'email' => 'user3@example.com',
            'subject' => 'Password Reset Request',
            'body' => 'Click here to reset your password.',
            'status' => 'pending',
        ]);
    }
}
