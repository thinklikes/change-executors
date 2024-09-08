<?php

namespace Tests\Feature;

use App\Contracts\DrinkCommandInterface;
use App\Contracts\DrinkControllerInterface;
use App\Contracts\DrinkListenerInterface;
use App\Drinks\Console\Commands\CocaCommand;
use App\Drinks\Console\Commands\SpriteCommand;
use App\Drinks\Listeners\CocaListener;
use App\Drinks\Listeners\SpriteListener;
use App\Http\Controllers\CocaController;
use App\Http\Controllers\SpriteController;
use App\Providers\DrinkServiceProvider;
use Exception;
use Tests\TestCase;

class LaunchDrinkTest extends TestCase
{
    public function testCoca()
    {
        $this->runAsCoca();

        $this->assertInstanceOf(CocaController::class, $this->app->make(DrinkControllerInterface::class));
        $this->assertInstanceOf(CocaCommand::class, $this->app->make(DrinkCommandInterface::class));
        $this->assertInstanceOf(CocaListener::class, $this->app->make(DrinkListenerInterface::class));
    }

    public function testSprite()
    {
        $this->runAsSprite();

        $this->assertInstanceOf(SpriteController::class, $this->app->make(DrinkControllerInterface::class));
        $this->assertInstanceOf(SpriteCommand::class, $this->app->make(DrinkCommandInterface::class));
        $this->assertInstanceOf(SpriteListener::class, $this->app->make(DrinkListenerInterface::class));
    }

    private function runAsCoca(): void
    {
        $this->resetDrink('coca');
    }

    private function runAsSprite(): void
    {
        $this->resetDrink('sprite');
    }

    protected function resetDrink(string $brand): void
    {
        $config = $this->app->make('config');
        $config->offsetUnset('drink');
        $config->set('drink.drink', $brand);

        try {
            (new DrinkServiceProvider($this->app))->register();
        } catch (Exception $e) {
        }
    }
}
