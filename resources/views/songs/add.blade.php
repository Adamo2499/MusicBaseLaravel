<!DOCTYPE html>
<html lang="pl">
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <h2>Dodaj piosenkę</h2>
    <br>
    <form action="<?= config('app.url') ?>/songs/save" method="post" class="form-inline">
        @csrf
        <p>
            <label for="songname">Tytuł piosenki: <sup>*</sup> <br>
                <input type="text" name="songname" id="songname" required>
            </label>
        </p>
        <br>
        <p>
            <label for="songperformer">Wykonawcy:<sup>*</sup> </label><br>
            <select name="songperformer" id="songperformer">
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <label for="songalbumid">Album:<sup>*</sup> </label><br>
            <select name="songalbumid" id="songalbumid">
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                @endforeach
            </select>
        </p>
        <br>
        <p>
            <label for="songduration">Długość piosenki: <sup>*</sup> <br>
                <input type="text" name="songduration" id="songduration" placeholder="XX:XX">
            </label>
        </p>
        <br>
        <p>
            <label for="songgenre">Gatunek piosenki: <sup>*</sup> <br>
                <input type="text" name="songgenre" id="songgenre">
            </label>
        </p>
        <br>
        <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p>
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
    @include('parts.footer')
</body>

</html>
