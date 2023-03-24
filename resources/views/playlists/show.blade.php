<!DOCTYPE html>
<html>
@include('parts.head')

<body>
    @include('parts.nav')
    <div id="zawartosc">
        <h2>Potwierdzenie usunięcia artysty</h2>
        <form action="<?= config('app.url') ?>/artists/delete/{{ $artist->id }}" method="post" class="form-inline">
            @csrf
            <p>
                <label for="id">ID artysty: </label>
                <input id="id" name="id" value="{{ $artist->id }}" readonly>
            </p>
            <p>
                <label for="artistname">Pseudonim artysty / Nazwa zespołu: <sup>*</sup> <input type="text"
                        name="artistname" id="artistname" value="{{ $artist->name }}" readonly></label>
            </p>
            <p>
                <label for="artistdesc">Opis artysty:<sup>*</sup>
                    <textarea name="artistdesc" id="artistdesc"readonly>{{ $artist->description }}</textarea>
                </label>
            </p>
            <p>

                <label for="artistcategory">Rodzaj artysty:<sup>*</sup> </label>
                <select name="artistcategory" id="artistcategory" readonly>
                    <option value="1" @if ($artist->type == 'solo') selected @endif>Artysta solowy</option>
                    <option value="2" @if ($artist->type != 'solo') selected @endif>Zespół</option>
                </select>
            </p>
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
