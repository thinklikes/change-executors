<?php

namespace App\Providers;

use App\Contracts\DrinkCommandInterface;
use App\Contracts\DrinkControllerInterface;
use App\Contracts\DrinkListenerInterface;
use App\Drinks\Console\Commands\CocaCommand;
use App\Drinks\Console\Commands\SpriteCommand;
use App\Drinks\Listeners\CocaListener;
use App\Drinks\Listeners\SpriteListener;
use App\Events\DrinkEvent;
use App\Http\Controllers\CocaController;
use App\Http\Controllers\SpriteController;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class DrinkServiceProvider extends ServiceProvider
{
    protected array $executors = [
        'coca' => [
            DrinkControllerInterface::class => CocaController::class,
            DrinkCommandInterface::class => CocaCommand::class,
            DrinkListenerInterface::class => CocaListener::class,
        ],
        'sprite' => [
            DrinkControllerInterface::class => SpriteController::class,
            DrinkCommandInterface::class => SpriteCommand::class,
            DrinkListenerInterface::class => SpriteListener::class,
        ],
    ];

    /**
     * Register services.
     * @throws Exception
     */
    public function register(): void
    {
        $executorKey = config('drink.drink');

        if (!isset($this->executors[$executorKey])) {
            throw new Exception('尚未選飲料喔');
        }
        foreach ($this->executors[$executorKey] as $abstract => $executor) {
            $this->app->bind($abstract, function () use ($executor) {
                return new $executor;
            });

            if (new $executor instanceof Command) {
                $this->commands($abstract);
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(
            DrinkEvent::class,
            DrinkListenerInterface::class,
        );
    }

    /**
     * 緩載入
     * @return array
     */
    public function provides(): array
    {
        $executorKey = config('drink.drink');

        return array_merge(
            array_keys($this->executors[$executorKey]),
            array_values($this->executors['coca']),
            array_values($this->executors['sprite']),
        );
    }
}
