<!DOCTYPE html>
<html>
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <div id="zawartosc">
        <h2>Dodaj album</h2>
        <form action="<?= config('app.url') ?>/albums/save" method="post" class="form-inline" enctype = multipart/form-data>
            @csrf
            <p>
                <label for="albumname">Nazwa albumu <sup>*</sup><br> 
                    <input type="text" name="albumname" id="albumname">
                </label><br>
            </p>
            <p>
                <label for="albumperformer">Wykonawca:<sup>*</sup> </label><br>
                <select name="albumperformer" id="albumperformer">
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="albumcategory">Gatunek: <sup>*</sup><br> 
                    <input type="text" name="albumcategory" id="albumcategory">
                </label><br>
            </p>
            {{-- <p>
                <p>
                    <label for="albumcoverimage">Zdjęcie okładki albumu:<sup>*</sup> </label><br>
                    <input type="file" name="albumcoverimage" id="albumcoverimage" accept="image/png, image/jpeg">
                </p>
            </p>
            <br> --}}
            <p>
                <label for="albumpublishingyear">Rok wydania albumu <sup>*</sup><br> 
                    <input type="number" name="albumpublishingyear" id="albumpublishingyear" min="1950" max="2023">
                </label><br>
            </p>
            <br>
            <p>
                <button type="submit" class="btn btn-primary mb-2">Dodaj</button>
                <button type="reset">Resetuj</button>
            </p> 
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
