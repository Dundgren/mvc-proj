<?php

namespace Dundgren\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dundgren\Models\Winner;

class WinnerController extends Controller
{
    public function getData()
    {
        $winners = [];
        foreach (Winner::all() as $win) {
            array_push($winners, $win);
        }

        return view("winner.index", [
            "winners" => $winners,
        ]);
    }

    public function addWinner($name)
    {
        $winner = new Winner();

        $winner->name = $name;

        $winner->save();
    }
}
