<!DOCTYPE html>
<html lang="pl">
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <h2>Lista albumów</h2>
    <table>
        <thead>
            <tr>
                <th> Nazwa </th>
                <th> ID artysty </th>
                <th> Kategoria </th>
                <th> Okładka </th>
                <th> Rok wydania </th>
                @if(Auth::check())
                <th> Edytuj </th>
                <th> Usuń </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td> {{$album->name}} </td>
                    <td> {{$album->artistid}} </td>
                    <td> {{$album->category}} </td>
                    <td> <img src="<?= config('app.url') ?>/images/{{$album->coverimage}}" alt="Zdjęcie okładki {{$album->name}}"> </td>
                    <td> {{$album->publishingyear}} </td>
                    @if(Auth::check())
                    <td><a href="<?= config('app.url') ?>/albums/edit/{{ $album->id }}">Edytuj</a></td>
                    <td><a href="<?= config('app.url') ?>/albums/show/{{ $album->id }}">Usuń</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('parts.footer')
</body>

</html>
