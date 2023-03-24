<!DOCTYPE html>
<html lang="pl">
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <h2>Lista artystów</h2>
    <table>
        <thead>
            <tr>
                <th> Nazwa </th>
                <th> Opis </th>
                <th> Typ (artysta solowy / zespół) </th>
                <th> Oficjalna strona </th>
                @if(Auth::check())
                <th> Edytuj </th>
                <th> Usuń </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($artists as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->type }}</td>
                    <td><a href="{{ $item->ofc_website }}" target="_blank">Oficjalna strona</a></td>
                    @if(Auth::check())
                    <td><a href="<?= config('app.url') ?>/artists/edit/{{ $item->id }}">Edytuj</a></td>
                    <td><a href="<?= config('app.url') ?>/artists/show/{{ $item->id }}">Usuń</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('parts.footer')
</body>

</html>
