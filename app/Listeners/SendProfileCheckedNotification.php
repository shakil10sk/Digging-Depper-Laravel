<?php

namespace App\Listeners;

use App\Events\SomeoneCheckedProfile;
use App\Jobs\SendProfileCheckedMailJob;
use App\Mail\ProfileCheckedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProfileCheckedNotification implements ShouldQueue  
{
    public int $delay = 5;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // dd("shakil");
        $test = true;

    }


    /**
     * Handle the event.
     *
     * @param  \App\Events\SomeoneCheckedProfile  $event
     * @return void
     */
    public function handle(SomeoneCheckedProfile $event)
    {
        // $event->user;
        dd($event);
        // $delay = now()->addSeconds(3);
        // SendProfileCheckedMailJob::dispatch($event->user)->delay($delay);

        Mail::to($event->user->email)
        ->send(new ProfileCheckedMail($event->user));
    }
}
