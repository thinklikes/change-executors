<?php

namespace App\Http\Controllers;

use App\Contracts\DrinkControllerInterface;
use Illuminate\Http\Request;

class SpriteController extends Controller implements DrinkControllerInterface
{
    public function drink()
    {
        return 'I love Sprite!!';
    }
}
