<?php

namespace App\Drinks\Listeners;

use App\Contracts\DrinkListenerInterface;
use App\Events\DrinkEvent;
use Illuminate\Support\Facades\Log;

class SpriteListener implements DrinkListenerInterface
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
        Log::info('I love Sprite!!');
    }
}
