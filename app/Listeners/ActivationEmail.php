<?php

namespace App\Listeners;
use Mail;
use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationEmail
{
    public $event;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
            Mail::send('emails.accountActivation', ['event' => $event], function ($m) use ($event) {
            $m->from('admin@app.com', 'Your Application');

            $m->to($event->email, $event->name)->subject('Account Activation link');
        });

    }
}
