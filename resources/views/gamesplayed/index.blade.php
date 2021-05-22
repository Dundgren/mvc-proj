@extends("layouts.app")

@section("content")
<div class="span2">
    <h1>Previous games!</h1>
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

    <h2>Histogram of winning scores</h2>
    @foreach ($histogram as $key => $value)
        <p>{{ $key }}: 
        @for ($i = 0; $i < $value; $i++)
        *
        @endfor
        </p>
    @endforeach
</div>
@endsection
