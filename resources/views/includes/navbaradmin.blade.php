<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/dashboard">
        <img src="{{ session('config')['logo'] }}" class="m-2" style="transform: scale(1.7);" alt="Logo de l'aplicació">
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a href="{{ route('home') }}" class="navbar-item">
            <i class="fa-solid fa-globe mr-2"></i> Web
        </a>
        @if(session('config')['allowResult'])
            <a href="{{ route('results') }}" class="navbar-item">
                <i class="fa-solid fa-square-poll-vertical mr-2"></i> Results
            </a>
        @endif
        @if(session('config')['allowPactometer'])
            <a href="{{ route('pactometer') }}" class="navbar-item">
                <i class="fa-solid fa-handshake mr-2"></i> Pactometer
            </a>
        @endif
        @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'manager')
            <a href="{{ route('candidates') }}" class="navbar-item">
                <i class="fa-solid fa-person-booth mr-2"></i> Candidates Management
            </a>
        @endif
        @if(Auth::user()->role == 'administrator')
            <a href="{{ route('users') }}" class="navbar-item">
                <i class="fa-solid fa-user-group mr-2"></i> Users Management
            </a>
        @endif
        @if((Auth::user()->role == 'administrator' || Auth::user()->role == 'manager' || Auth::user()->role == 'supervisor') && (session('config')['allowLegislatures']))
            <a href="{{ route('legislatures') }}" class="navbar-item">
                <i class="fa-solid fa-landmark mr-2"></i> Legislatures
            </a>
        @endif
      </div>

      <div class="navbar-end">
        @if(Auth::user()->role == 'administrator')
            <a href="{{ route('configuration') }}" class="navbar-item">
                <i class="fa-solid fa-gear"></i>
            </a>
        @endif
        <div class="navbar-item">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                    <figure class="image is-32x32 ml-2">
                        <img src="{{ Auth::user()->icon }}" alt="Avatar user" class="is-rounded">
                    </figure>
                </a>

                <div class="navbar-dropdown">
                    <a href="{{ route('yourProfile') }}" class="navbar-item">
                        <i class="fas fa-user mr-2"></i> Your Profile
                    </a>
                    <a href="{{ route('home') }}" class="navbar-item">
                        <i class="fa-solid fa-globe mr-2"></i> Web
                    </a>
                    <hr class="navbar-divider">
                    <a href="{{ route('logout') }}" class="navbar-item">
                        <i class="fas fa-right-from-bracket mr-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {
            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

                });
            });
        }
    });
</script>
