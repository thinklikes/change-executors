<?php

namespace Tests\Feature\Jobs;

use App\Jobs\CocaJob;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class CocaJobTest extends TestCase
{

    public function testHandle()
    {
        Queue::fake();

        CocaJob::dispatch();

        Queue::assertPushed(CocaJob::class);
    }
}
