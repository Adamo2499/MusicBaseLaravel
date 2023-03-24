<!DOCTYPE html>
<html>
@include('parts.head')

<body>
    @include('parts.header')
    @include('parts.nav')
    <main>
        <h2>Zmień dane użytkownika</h2>
        <form action="<?= config('app.url') ?>/users/update/{{ $user->id }}" method="post" class="form-inline">
            @csrf
            <p>
                <label for="id">ID użytkownika: </label><br>
                <input id="id" name="id" value="{{ $user->id }}" readonly>
            </p>
            <p>
                <label for="username">Nazwa użytkownika: <br>
                    <input type="text" name="username" id="username" value="{{$user->name}}" readonly>
                </label>
            </p>
            <p>
                <label for="useremail">Adres email: <br>
                    <input type="text" name="useremail" id="useremail" value="{{$user->email}}" readonly>
                </label>
            </p>
            <p>
                <label for="usertype">Typ użytkownika:<sup>*</sup> </label><br>
                <select name="usertype" id="usertype">
                    <option value="user" @if ($user->type == 'user') selected @endif>Uzytkownik</option>
                    <option value="admin" @if ($user->type == 'admin') selected @endif>Administrator</option>
                </select>
            </p>
            <p><button type="submit" class="btn btn-primary mb-2">Zapisz</button></p>
    </main>
    @include('parts.footer')
</body>

</html>
