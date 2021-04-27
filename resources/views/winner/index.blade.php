@extends("layouts.app")

@section("content")
    <h1>Winners!</h1>
    <h2>These are winners who achieved a perfect score of 21!</h2>
    <table>
        <tr>
        <th>Id</th>
        <th>Winner</th>
        <th>Time of perfect score</th>
        </tr>
        @foreach ($winners as $winner)
            <tr>
            <td>{{ $winner->id }}</td>
            <td>{{ $winner->name }}</td>
            <td>{{ $winner->updated_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection
