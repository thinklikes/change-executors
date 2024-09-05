<?php

namespace Tests\Feature\Console\Commands;

use Tests\TestCase;

class CocaCommandTest extends TestCase
{
    public function testHandle()
    {
        $this->artisan('app:coca')
            ->expectsOutput('I love Coca!!')
            ->assertExitCode(0);
    }
}
