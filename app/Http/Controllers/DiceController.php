<?php

namespace Dundgren\Http\Controllers;

use App\Http\Controllers\Controller;
use Dundgren\Models\Dice\Dice;

class DiceController extends Controller
{
    public function roll()
    {
        $dice = new Dice(6);
        $res = $dice->rollDice();

        return view("dice.index", [
            "result" => $res,
        ]);
    }
}
