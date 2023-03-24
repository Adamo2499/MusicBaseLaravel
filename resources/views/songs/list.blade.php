<!DOCTYPE html>
<html lang="pl">
  @include('parts.head')
  <body>
    @include('parts.header')
    @include('parts.nav')
    <h2>Lista piosenek</h2>
    <table>
        <thead>
            <tr>
                <th> Tytuł </th>
                <th> Wykonawca </th>
                <th> Album </th>
                <th> Długość </th>
                <th> Gatunek </th>
                @if (Auth::check())
                <th> Edytuj </th>
                <th> Usuń </th>
                <th> Dodaj do playlisty </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song)
                <tr>
                    <td>{{$song -> title}}</td>
                    @foreach ($artists as $artist)
                        @if($artist->id == $song -> performer)
                            {{-- <td>{{$artist->name}}</td> --}}
                            <td> <a href="<?= config('app.url') ?>/artists/details/{{ $artist->id }}">{{$artist->name}}</a></td>
                        @endif
                    @endforeach
                    @foreach ($albums as $album)
                        @if($album->id == $song -> albumid)
                            {{-- <td>{{$album -> name}}</td> --}}
                            <td> <a href="<?= config('app.url') ?>/albums/details/{{ $album->id }}">{{$album->name}}</a></td>
                        @endif
                    @endforeach
                    
                    <td>{{$song -> duration}}</td>
                    <td>{{$song -> genre}}</td>
                    @if (Auth::check())
                    <td><a href="<?= config('app.url') ?>/songs/edit/{{ $song->id }}">Edytuj</a></td>
                    <td><a href="<?= config('app.url') ?>/songs/show/{{ $song->id }}">Usuń</a></td>
                    <td><a href="<?= config('app.url') ?>/playlists/expand/{{ $song->id }}">Dodaj do playlisty</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('parts.footer')
  </body>
</html>
