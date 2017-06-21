<?php

namespace App\Listeners;

use App\Events\NotificationChallengeRecieved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateChallengeNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificationChallengeRecieved  $event
     * @return void
     */
    public function handle(NotificationChallengeRecieved $event)
    {
       dd($event->notification);
    }
}
