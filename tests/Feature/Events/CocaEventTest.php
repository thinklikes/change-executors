<?php

namespace Tests\Feature\Events;

use App\Events\DrinkEvent;
use App\Listeners\CocaListener;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CocaEventTest extends TestCase
{
    public function testHandle()
    {
        Event::fake();

        DrinkEvent::dispatch();

        Event::assertListening(
            DrinkEvent::class,
            CocaListener::class
        );
    }
}
