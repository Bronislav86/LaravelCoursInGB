<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class SendNewsToRemoteServer
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
     * @param  \App\Events\NewsCreated  $event
     * @return void
     */
    public function handle(NewsCreated $event)
    {
        Log::info('Send news To Remote Server listener fired ' . $event->news->id);
    }
}
