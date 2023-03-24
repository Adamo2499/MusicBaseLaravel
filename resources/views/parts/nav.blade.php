<nav>
    <ul>
        <li class="dropdown"><a href="<?= config('app.url') ?>">Strona główna</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Przegląd</a>
            <div class="dropdown-content">
                <a href="<?= config('app.url') ?>/songs/list">Piosenki</a>
                <a href="<?= config('app.url') ?>/albums/list">Albumy</a>
                <a href="<?= config('app.url') ?>/artists/list">Wykonawcy</a>
                @if (Auth::check())
                    <a href="<?= config('app.url') ?>/playlists/list">Playlisty</a>
                @endif
                @if (Auth::check() && Auth::user()->type == 'admin')
                    <a href="<?= config('app.url') ?>/users/list">Użytkownicy</a>
                @endif
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class=",dropbtn">Dodawanie</a>
            <div class="dropdown-content">
                <a href="<?= config('app.url') ?>/songs/add">Piosenki</a>
                <a href="<?= config('app.url') ?>/albums/add">Albumy</a>
                <a href="<?= config('app.url') ?>/artists/add">Wykonawcy</a>
                @if (Auth::check())
                    <a href="<?= config('app.url') ?>/playlists/add">Playlisty</a>
                @endif
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Konto</a>
            <div class="dropdown-content">
                @if (Auth::check())
                    <a href="<?= config('app.url') ?>/logout">Wyloguj</a>
                @else
                    <a href="<?= config('app.url') ?>/login">Zaloguj</a>
                @endif
                @if (Auth::guest())
                    <a href="<?= config('app.url') ?>/register">Rejestracja</a>
                @endif
            </div>
        </li>
    </ul>
</nav>
