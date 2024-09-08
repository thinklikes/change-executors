<?php

namespace App\Drinks\Console\Commands;

use App\Contracts\DrinkCommandInterface;
use Illuminate\Console\Command;

class SpriteCommand extends Command implements DrinkCommandInterface
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:drink';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('I love Sprite!!');
    }
}
