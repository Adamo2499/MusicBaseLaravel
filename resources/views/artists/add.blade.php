<!DOCTYPE html>
<html lang="pl">
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <h2>Dodaj artystę</h2>
    <br>
    <form action="<?= config('app.url') ?>/artists/save" method="post" class="form-inline">
        @csrf
        <p>
            <label for="artistname">Pseudonim artysty / Nazwa zespołu: <sup>*</sup> <br>
                 <input type="text" name="artistname" id="artistname">
            </label>
        </p>
        <p>
            <label for="artistdesc">Opis artysty:<sup>*</sup><br>
                <textarea name="artistdesc" id="artistdesc"></textarea>
            </label>
        </p>
        <p>
            <label for="artistcategory">Rodzaj artysty:<sup>*</sup> </label><br>
            <select name="artistcategory" id="artistcategory">
                <option value="1">Artysta solowy</option>
                <option value="2">Zespół</option>
            </select>
        </p>
        <br>
        <p>
            <label for="artistwebsite">Oficjalna strona: <sup>*</sup> <br>
                 <input type="url" name="artistwebsite" id="artistwebsite" placeholder="https://example.com"
                 pattern="https://.*" size="30">
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
