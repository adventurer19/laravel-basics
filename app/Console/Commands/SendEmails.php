<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PendingEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendEmails extends Command
{
    protected $signature = 'email:send-pending';
    protected $description = 'Send all pending emails from the database.';

    public function handle()
    {
        $this->info('Fetching pending emails...');

        $pendingEmails = PendingEmail::where('status', 'pending')->get();

        foreach ($pendingEmails as $email) {
            try {
                Mail::raw($email->body, function ($message) use ($email) {
                    $message->to($email->email)
                        ->subject($email->subject);
                });

                $email->update([
                    'status' => 'sent',
                    'sent_at' => Carbon::now(),
                ]);

                $this->info("Email sent to: {$email->email}");
            } catch (\Exception $e) {
                $email->update([
                    'status' => 'failed',
                ]);
                $this->error("Failed to send email to: {$email->email}");
            }
        }

        $this->info('Done sending emails.');
    }
}
