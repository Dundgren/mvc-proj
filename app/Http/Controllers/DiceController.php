<?php

namespace Dundgren\Controller;

use App\Http\Controllers\Controller;
use Dundgren\Dice\Dice;

class DiceController extends Controller
{
    public function roll()
    {
        return view("dice.index");
    }
}
