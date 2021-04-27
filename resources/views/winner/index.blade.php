@extends("layouts.app")

@section("content")
    <h1>Winners!</h1>
    <h2>These are winners who achieved a perfect score of 21!</h2>
    <table>
        <tr>
        <th>Titel</th>
        <th>Författare</th>
        <th>ISBN</th>
        <th>Bild-länk</th>
        </tr>
        @foreach ($winners as $winner)
            <tr>
            <td>test</td>
            </tr>
        @endforeach
    </table>
@endsection
