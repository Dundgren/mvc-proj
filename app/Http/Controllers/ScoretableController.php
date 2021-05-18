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

        if ($result == "win") {
            $this->handleWin($blackjack, $bet);
        } elseif ($result == "loss") {
            $this->handleLoss($blackjack, $bet);
        }
    }

    private function handleWin($blackjack, $bet)
    {
        $player = Scoretable::find(1);
        $bot = Scoretable::find(2);

        $player->wins = $player->wins + 1;

        if ($blackjack) {
            $player->jackpots = $player->jackpots + 1;
            $player->money = $player->money + $bet * 1.5;
            $bot->money = $bot->money - $bet * 1.5;
        } else {
            $player->money = $player->money + $bet;
            $bot->money = $bot->money - $bet;
        }

        $player->save();
        $bot->save();
    }

    private function handleLoss($blackjack, $bet)
    {
        $player = Scoretable::find(1);
        $bot = Scoretable::find(2);

        $bot->wins = $bot->wins + 1;
        $bot->money = $bot->money + $bet;

        if ($blackjack) {
            $bot->jackpots = $bot->jackpots + 1;
        }

        $player->money = $player->money - $bet;

        $player->save();
        $bot->save();
    }

    public function reset()
    {
        $row = Scoretable::find(1);

        $row->wins = 0;
        $row->jackpots = 0;
        $row->money = 10000;

        $row->save();
    }
}
