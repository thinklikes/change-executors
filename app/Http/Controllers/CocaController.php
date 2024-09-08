<?php

namespace App\Http\Controllers;

use App\Contracts\DrinkControllerInterface;
use Illuminate\Http\Request;

class CocaController extends Controller implements DrinkControllerInterface
{
    public function drink()
    {
        return 'I love Coca!!';
    }
}
