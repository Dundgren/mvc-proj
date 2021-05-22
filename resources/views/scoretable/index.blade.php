@extends("layouts.app")

@section("content")
<div class="span2">
    <h1>Scoretable!</h1>
    <table>
        <tr>
        <th>Name</th>
        <th>Wins</th>
        <th>Blackjacks</th>
        <th>Money</th>
        <th>Last updated</th>
        </tr>
        @foreach ($data as $row)
            <tr>
            <td>{{ $row->name }}</td>
            <td>{{ $row->wins }}</td>
            <td>{{ $row->jackpots }}</td>
            <td>{{ $row->money }}</td>
            <td>{{ $row->updated_at }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
