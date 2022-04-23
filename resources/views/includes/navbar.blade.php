<nav class="navbar is-link is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
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
        @auth()
            <a href="{{ route('dashboard') }}" class="navbar-item">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        @endauth
        <a href="{{ route('contact') }}" class="navbar-item">
            <i class="fa-solid fa-paper-plane mr-2"></i> Contact
        </a>
      </div>

      <div class="navbar-end">
        @if(Auth::check() && Auth::user()->role == 'administrator')
            <a href="{{ route('configuration') }}" class="navbar-item">
                <i class="fa-solid fa-gear"></i>
            </a>
        @endif
        <div class="navbar-item">
            @if(Auth::check())
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
                        <a href="{{ route('dashboard') }}" class="navbar-item">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                        <hr class="navbar-divider">
                        <a href="{{ route('logout') }}" class="navbar-item">
                            <i class="fas fa-right-from-bracket mr-2"></i> Logout
                        </a>
                    </div>
                </div>
            @else
                <div class="buttons">
                    <a href="/register" class="button is-dark">
                        <strong>Sign up</strong>
                    </a>
                    <a href="/login" class="button is-light">
                        <i class="fas fa-right-to-bracket mr-2"></i> Login
                    </a>
                </div>
            @endif
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
