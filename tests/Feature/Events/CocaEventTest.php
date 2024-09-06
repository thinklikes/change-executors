<?php

namespace Tests\Feature\Events;

use App\Events\CocaEvent;
use App\Listeners\CocaListener;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CocaEventTest extends TestCase
{
    public function testHandle()
    {
        Event::fake();

        CocaEvent::dispatch();

        Event::assertListening(
            CocaEvent::class,
            CocaListener::class
        );
    }
}
