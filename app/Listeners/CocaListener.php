<?php

namespace App\Listeners;

use App\Events\DrinkEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CocaListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DrinkEvent $event): void
    {
        //
    }
}
