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

        $histogram = $this->getHistogram();

        return view("gamesplayed.index", [
            "histogram" => $histogram,
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

    private function getHistogram()
    {
        $histogram = [];

        for ($i = 0; $i <= 21; $i++) {
            $histogram[$i] = 0;
        }

        foreach (GamesPlayed::all() as $row) {
            $score = 0;

            if ($row->winner == "Player") {
                $score = $row->player_score;
            } elseif ($row->winner == "House") {
                $score = $row->bot_score;
            }

            $histogram[$score] = $histogram[$score] + 1;
        }

        return $histogram;
    }
}
