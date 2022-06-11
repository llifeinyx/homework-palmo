<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailVerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private array $info;

    public function __construct(string $email, string $name, string $url)
    {
        $this->info = [
            'email' => $email,
            'name' => $name,
            'url' => $url
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.verification', ['name' => $this->info['name'], 'url' => $this->info['url']], function ($message) {
            $message->to($this->info['email'], $this->info['name'])->subject('Verification email');
            $message->from('example@gmail.com', 'palmo');
        });
    }
}
