<!DOCTYPE html>
<html>
@include('parts.head')

<body>
    @include('parts.nav')
    <div id="zawartosc">
        <h2>Szczegóły</h2>
        <form action="#" method="post" class="form-inline">
            @csrf
            <p>
                <label for="id">ID artysty: </label><br>
                <input id="id" name="id" value="{{ $artist->id }}" readonly>
            </p>
            <p>
                <label for="artistname">Pseudonim artysty / Nazwa zespołu: <sup>*</sup><br>
                     <input type="text"
                        name="artistname" id="artistname" value="{{ $artist->name }}" readonly>
                </label><br>
            </p>
            <p>
                <label for="artistdesc">Opis artysty:<sup>*</sup><br>
                    <textarea name="artistdesc" id="artistdesc"readonly>{{ $artist->description }}</textarea>
                </label>
            </p>
            <p>
                <label for="artistcategory">Rodzaj artysty:<sup>*</sup> </label><br>
                <select name="artistcategory" id="artistcategory" readonly>
                    <option value="1" @if ($artist->type == 'solo') selected @endif>Artysta solowy</option>
                    <option value="2" @if ($artist->type != 'solo') selected @endif>Zespół</option>
                </select>
            </p>
            <p>
                <label for="artistwebsite">Oficjalna strona: <sup>*</sup> <br>
                     <input type="url" name="artistwebsite" id="artistwebsite" placeholder="https://example.com"
                     pattern="https://.*" size="30" value="{{$artist->ofc_website}}" readonly>
                </label>
            </p>
            <br>
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
