<!DOCTYPE html>
<html lang="pl">
  @include('parts.head')
  <body>
    @include('parts.header')
    @include('parts.nav')
    <main>
        <h2>Lista użytkowników</h2>
        <table>
          <thead>
            <tr>
              <th> Nazwa użytkownika </th>
              <th> Adres email </th>
              <th> Typ </th>
              <th> Zmiana typu </th>
              <th> Usuń </th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->type}}</td>
                <td> <a href="<?= config('app.url') ?>/users/edit/{{ $user->id }}">
                    @if ($user->type == "admin")
                      Zdegraduj do zwykłego użytkownika 
                    @elseif ($user->type == "user")
                      Awansuj na administratora
                    @endif
                </a>
                </td>
                <td><a href="<?= config('app.url') ?>/users/show/{{ $user->id }}">Usuń</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </main>
    @include('parts.footer')
    </body>
</html>