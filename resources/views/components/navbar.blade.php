<nav class="navbar fixed-top">
  <div class="container-fluid ">

    <!-- Logo -->
    <a class="navbar-brand" href="/" aria-label="Home">
      <img src="{{ asset('storage/articles_images/logo.png') }}" alt="Logo" class="logo">
    </a>

    <!-- Barra di ricerca -->

    <x-search />


    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto">
        <!-- Admin Dropdown -->
        @if (Auth::check() && Auth::user()->is_admin)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin Dashboard
          </a>
          <ul class="dropdown-menu custom-dropdown" aria-labelledby="adminDropdown">
            <li>
              <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
          </ul>
        </li>
        @endif

        <!-- Revisor Dropdown -->
        @if (Auth::check() && Auth::user()->is_revisor)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="revisorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Revisor Dashboard
          </a>
          <ul class="dropdown-menu custom-dropdown" aria-labelledby="revisorDropdown">
            <li>
              <a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard</a>
            </li>
          </ul>
        </li>
        @endif

        <!-- Writer Dropdown -->
        @if (Auth::check() && Auth::user()->is_writer)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="writerDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Writer Dashboard
          </a>
          <ul class="dropdown-menu custom-dropdown" aria-labelledby="writerDropdown">
            <li>
              <a class="dropdown-item" href="{{ route('writer.dashboard') }}">Dashboard</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('articles.create') }}">Pubblica una ricetta</a>
            </li>
          </ul>
        </li>
        @endif

        <!-- Auth Links -->
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
        @endauth

        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>