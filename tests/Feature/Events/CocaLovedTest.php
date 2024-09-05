<?php

namespace Tests\Feature\Events;

use App\Events\CocaLoved;
use App\Listeners\SendPodcastNotification;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CocaLovedTest extends TestCase
{
    public function testHandle()
    {
        Event::fake();

        CocaLoved::dispatch();

        Event::assertListening(
            CocaLoved::class,
            SendPodcastNotification::class
        );
    }
}
