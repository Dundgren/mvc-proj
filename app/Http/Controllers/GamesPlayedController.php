<?php

namespace Dundgren\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dundgren\Models\GamesPlayed;

class GamesPlayedController extends Controller
{
    public function getData()
    {
        $data = [];
        foreach (GamesPlayed::all() as $row) {
            array_push($data, $row);
        }

        return view("gamesplayed.index", [
            "data" => $data,
        ]);
    }

    public function addGame($result, $bet, $blackjack, $playerScore, $botScore)
    {
        $game = new GamesPlayed();

        if ($result == "win") {
            $game->winner = "Player";
        } elseif ($result == "loss") {
            $game->winner = "House";
        }

        $game->bet = $bet;
        $game->blackjack = $blackjack;
        $game->player_score = $playerScore;
        $game->bot_score = $botScore;

        $game->save();
    }
}
