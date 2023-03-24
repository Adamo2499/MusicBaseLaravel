<!DOCTYPE html>
<html>
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <div id="zawartosc">
        <h2>Potwierdź usunięcie piosenki</h2>
        <form action="<?= config('app.url') ?>/songs/delete/{{ $song->id }}" method="post" class="form-inline">
            @csrf
            <p>
                <label for="id">ID piosenki: </label><br>
                <input id="id" name="id" value="{{ $song->id }}" readonly>
            </p>
            <p>
                <label for="songname">Tytuł piosenki: <sup>*</sup> <br>
                    <input type="text" name="songname" id="songname" value="{{$song->title}}" readonly>
                </label>
            </p>
            <br>
            <p>    
                <label for="songperformer">Wykonawcy:<sup>*</sup> </label><br>
                <select name="songperformer" id="songperformer" disabled>
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                    @endforeach
                </select>
            </p>
            <p>    
                <label for="songalbumid">Album:<sup>*</sup> </label><br>
                <select name="songalbumid" id="songalbumid" disabled>
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="songduration">Długość piosenki: <sup>*</sup> <br>
                    <input type="text" name="songduration" id="songduration" placeholder="XX:XX" value="{{$song->duration}}" readonly>
                </label>
            </p>
            <br>
            <p>
                <label for="songgenre">Gatunek piosenki: <sup>*</sup> <br>
                    <input type="text" name="songgenre" id="songgenre" value="{{$song->genre}}" readonly>
                </label>
            </p>
            <br>
            <p><button type="submit" class="btn btn-primary mb-2">Usuń</button></p>
        </form>
        <p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </p>
    </div>
    @include('parts.footer')
</body>

</html>
