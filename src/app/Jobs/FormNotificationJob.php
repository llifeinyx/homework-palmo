<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class FormNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $dispatchInfo;

    public function __construct($dispatchInfo)
    {
        $this->dispatchInfo = $dispatchInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.form', ['user' => $this->dispatchInfo['username']], function ($message) {
            $message->to($this->dispatchInfo['email'], $this->dispatchInfo['username'])->subject('Create new smart form');
            $message->from('palmo.example@gmail.com', 'palmo');
        });
    }
}
