@extends("layouts.app")

@section("content")
    <h1>Scoretable!</h1>
    <table>
        <tr>
        <th>Id</th>
        <th>Winner</th>
        <th>Bet</th>
        <th>Blackjack</th>
        <th>Player Score</th>
        <th>Bot Score</th>
        <th>Time played</th>
        </tr>
        @foreach ($data as $row)
            <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->winner }}</td>
            <td>{{ $row->bet }}</td>
            <td>{{ $row->blackjack }}</td>
            <td>{{ $row->player_score }}</td>
            <td>{{ $row->bot_score }}</td>
            <td>{{ $row->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection
