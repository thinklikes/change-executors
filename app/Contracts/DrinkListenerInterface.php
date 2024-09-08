<?php

namespace App\Contracts;

use App\Events\DrinkEvent;

interface DrinkListenerInterface
{
    public function handle(DrinkEvent $event): void;
}
