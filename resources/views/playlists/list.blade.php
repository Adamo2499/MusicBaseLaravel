<!DOCTYPE html>
<html lang="pl">
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <main>
        <h2>Moje playlisty</h2>
        @foreach ($playlists as $playlist)
            <h3>Nazwa: {{ $playlist->name }} <br> Rozmiar: {{ $playlist->size }}</h3>
            <table>
                <thead>
                    <tr>
                        <th> Nuner utworu </th>
                        <th>Tytuł</th>
                        <th>Wykonawca</th>
                        <th>Album</th>
                        <th>Długość</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($songs as $song)
                        <tr>
                            <td>{{ $song->id }}</td>
                            <td>{{ $song->title }}</td>
                            @foreach ($artists as $artist)
                                @if ($artist->id == $song->performer)
                                    {{-- <td>{{$artist->name}}</td> --}}
                                    <td> <a
                                            href="<?= config('app.url') ?>/artists/details/{{ $artist->id }}">{{ $artist->name }}</a>
                                    </td>
                                @endif
                            @endforeach
                            @foreach ($albums as $album)
                                @if ($album->id == $song->albumid)
                                    {{-- <td>{{$album -> name}}</td> --}}
                                    <td> <a
                                            href="<?= config('app.url') ?>/albums/details/{{ $album->id }}">{{ $album->name }}</a>
                                    </td>
                                @endif
                            @endforeach
                            <td>{{ $song->duration }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </main>
    @include('parts.footer')
</body>

</html>
