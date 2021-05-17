<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;
$playerSum = $_SESSION["playerSum"] ?? 0;
$botSum = $_SESSION["botSum"] ?? 0;
$playerResults = $_SESSION["playerResults"] ?? null;
$botResults = $_SESSION["botResults"] ?? null;
$numDice = $_POST["dice"] ?? 0;
$started = $_GET["started"] ?? null;
$result = $_SESSION["result"] ?? null;
$history = $_SESSION["history"] ?? null;
$bet = $_POST["bet"] ?? 0;
$playerMoney = $_SESSION["playerMoney"] ?? 0;
$botMoney = $_SESSION["botMoney"] ?? 0;
?>

@extends("layouts.app")

@section("content")
    <h1>{{ $header }}</h1>
    <h2>{{ $message }}</h2>

    @if (!$started == "go")
        <form method="POST" action="{{ url('/game21/start?started=go') }}">
            @csrf
            <label for="dice">Choose number of dice</label>
            <select name="dice">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <label for="bet">Choose amount to bet</label>
            <input type="number" name="bet" min="1" max="100" required>
            <input type="submit" value="Start">
        </form>

        <p>Player money: {{ $playerMoney }}</p>
        <p>Bot money: {{ $botMoney }}</p>

        <p>Games played: {{ $history["roundCount"] }}</p>
        <p>
            Winners: 
            @foreach ($history["winners"] as $winner)
                {{ $winner }}, 
            @endforeach
        </p>

        <form method="POST" class="lone-button" action="{{ url('/game21/clear') }}">
            @csrf
            <input type="submit" value="Clear history">
        </form>
    @endif

    @if ($started == "go" || $started == "stop")
        <p>Player sum: {{ $playerSum }}</p>
        <p>Number of dice: {{ $numDice }}</p>
        <p>Current Bet: {{ $bet }}</p>
        <p class="dice-utf8">
        @foreach ($playerResults as $value)
            {!! $value !!} 
        @endforeach
        </p>

        @if ($started == "stop")
            <p>Bot sum: {{ $botSum }}</p>
            <p class="dice-utf8">
            @foreach ($botResults as $value)
                {!! $value !!} 
            @endforeach
            </p>
        @endif

        @if ($result == "continue")
            <form class="lone-button" method="POST" action="{{ url('/game21/start?started=go') }}">
                @csrf
                <input type="hidden" name="dice" value="{{ $numDice }}">
                <input type="hidden" name="bet" value="{{ $bet }}">
                <input type="submit" value="Roll">
            </form>
            <form class="lone-button" method="POST" action="{{ url('/game21/stop?started=stop') }}">
                @csrf
                <input type="hidden" name="dice" value="{{ $numDice }}">
                <input type="hidden" name="bet" value="{{ $bet }}">
                <input type="submit" value="Stop">
            </form>
        @endif
    @endif


@endsection
