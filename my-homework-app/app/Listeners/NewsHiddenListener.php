<?php

namespace App\Listeners;

use App\Events\NewsHidden;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NewsHiddenListener
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
     * @param  \App\Events\NewsHidden  $event
     * @return void
     */
    public function handle(NewsHidden $event)
    {
        Log::info('News ' . $event->news->id . ' hidden');
    }
}
