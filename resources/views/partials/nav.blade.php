<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Kiosks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Administration</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            @guest
                <li class="nav-item mr-auto">
                    <a href="#" class="nav-link">
                        Sign Ups
                    </a>
                </li>
                <li class="nav-item mr-auto">
                    <a href="#" class="nav-link">
                        Login
                    </a>
                </li>
                @else
                    <li class="nav-item mr-auto">
                        <a href="#" class="nav-link">
                            My Account
                        </a>
                    </li>
                @endguest
        </ul>

    </div>
</nav>