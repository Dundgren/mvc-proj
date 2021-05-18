<?php

namespace Dundgren\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dundgren\Models\Scoretable;

class ScoretableController extends Controller
{
    public function getData()
    {
        $data = [];
        foreach (Scoretable::all() as $row) {
            array_push($data, $row);
        }

        return view("scoretable.index", [
            "data" => $data,
        ]);
    }

    public function handleResult($result, $blackjack, $bet)
    {
        $player = Scoretable::find(1);
        $bot = Scoretable::find(2);


    }
}
