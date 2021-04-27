@extends("layouts.app")

@section("content")
    <h1>Books!</h1>
    <table>
        <tr>
        <th>Titel</th>
        <th>Författare</th>
        <th>ISBN</th>
        <th>Bild-länk</th>
        </tr>
        @foreach ($books as $book)
            <tr>
            <td>{{ $book->titel }}</td>
            <td>{{ $book->forfattare }}</td>
            <td>{{ $book->ISBN }}</td>
            <td><a href="{{ $book->bild }}">{{ $book->bild }}</a></td>
            </tr>
        @endforeach
    </table>
@endsection
