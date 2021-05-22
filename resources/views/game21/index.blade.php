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
$bet = $_POST["bet"] ?? 0;
?>

@extends("layouts.app")

@section("content")
    <div class="justify-center span2">
        <h1>{{ $header }}</h1>
        <h2>{{ $message }}</h2>
    </div>

    @if (!$started == "go")
        <form method="POST" class="justify-center span2" action="{{ url('/game21/start?started=go') }}">
            @csrf
            <p>Choose number of dice</p>
            <input type="radio" id="radio1" name="dice" value="1">
            <label for="radio1">1</label>
            <input type="radio" id="radio2" name="dice" value="2">
            <label for="radio2">2</label>
            <p>Choose amount to bet</p>
            <input type="number" name="bet" min="1" max="100" required>
            <input type="submit" value="Start">
        </form>
    @endif
    

    @if ($started == "go" || $started == "stop")
    <div>
        <p>Number of dice: {{ $numDice }}</p>
        <p>Current Bet: {{ $bet }}</p>
    </div>
    @if ($result == "continue")
    <div class="justify-right">
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
    </div>
    @endif

        <div class="gamefield">
            <h2>Player</h2>
            <p>Player sum: {{ $playerSum }}</p>
            <p class="dice-utf8">
            @foreach ($playerResults as $value)
                {!! $value !!} 
            @endforeach
            </p>
        </div>

        <div class="gamefield">
            <h2>House</h2>
            <p>House sum: {{ $botSum }}</p>
            @if ($started == "stop")
                <p class="dice-utf8">
                @foreach ($botResults as $value)
                    {!! $value !!} 
                @endforeach
                </p>
            @endif
        </div>
    @endif

@endsection
