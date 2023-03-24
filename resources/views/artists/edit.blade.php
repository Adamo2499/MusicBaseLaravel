<!DOCTYPE html>
<html>
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <div id="zawartosc">
        <h2>Edytuj dane artysty</h2>
        <form action="<?= config('app.url') ?>/artists/update/{{ $artist->id }}" method="post" class="form-inline">
            @csrf
            <p>
                <label for="id">ID artysty: </label><br>
                <input id="id" name="id" value="{{ $artist->id }}" readonly>
            </p>
            <p>
                <label for="artistname">Pseudonim artysty / Nazwa zespołu: <sup>*</sup><br> <input type="text"
                        name="artistname" id="artistname" value="{{ $artist->name }}"></label><br>
            </p>
            <p>
                <label for="artistdesc">Opis artysty:<sup>*</sup><br>
                    <textarea name="artistdesc" id="artistdesc">{{ $artist->description }}</textarea>
                </label>
            </p>
            <p>

                <label for="artistcategory">Rodzaj artysty:<sup>*</sup> </label><br>
                <select name="artistcategory" id="artistcategory">
                    <option value="1" @if ($artist->type == 'solo') selected @endif>Artysta solowy</option>
                    <option value="2" @if ($artist->type != 'solo') selected @endif>Zespół</option>
                </select>
            </p>
            <p>
            <p>
                <label for="artistwebsite">Oficjalna strona: <sup>*</sup> <br>
                    <input type="url" name="artistwebsite" id="artistwebsite" placeholder="https://example.com"
                        pattern="https://.*" size="30" value="{{$artist->ofc_website}}">
                </label>
            </p>
            <br>
            <button type="submit" class="btn btn-primary mb-2">Zapisz</button></p>
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
