<!DOCTYPE html>
<html>
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <div id="zawartosc">
        <h2>Dodaj playlist</h2>
        <form action="<?= config('app.url') ?>/playlists/save" method="post" class="form-inline">
            @csrf
            <p>
                <label for="playlistname">Nazwa playlisty <sup>*</sup><br> 
                    <input type="text" name="playlistname" id="playlistname">
                </label><br>
            </p>
            <br>
            <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p> 
        </form>
        <p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li><br>
                        @endforeach
                    </ul>
                </div>
            @endif
        </p>
    </div>
    @include('parts.footer')
</body>

</html>
