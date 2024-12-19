<nav class="nav navbar-expand-lg  text-uppercase fs-6 p-3 align-items-center fixed-top">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="col-auto">
      <a class="navbar-brand text-white" href="/" aria-label="Home">
        <img src="{{ asset('storage/articles_images/logo.png') }}" alt="Logo" class="logo">
      </a>
    </div>

    <x-search />

    <div class="col-auto d-flex">
      @if (Auth::check() && Auth::user()->is_admin)
        <a href="{{ route('admin.dashboard') }}" class="text-dark nav-link me-2 fw-bold">Admin Dashboard</a>
      @endif

      @if (Auth::check() && Auth::user()->is_revisor)
        <a href="{{ route('revisor.dashboard') }}" class="text-dark nav-link me-2 fw-bold">Revisor Dashboard</a>
      @endif

      @if (Auth::check() && Auth::user()->is_writer)
        <a href="{{ route('writer.dashboard') }}" class="text-dark nav-link me-2 fw-bold">Writer Dashboard</a>
        <a href="{{ route('articles.create') }}" class="text-dark nav-link me-2 fw-bold" id="publish-button">Pubblica una ricetta</a>
      @endif

      @auth
        <a class="text-dark nav-link me-2 fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      @endauth

      @guest
        <a href="{{route('login')}}" class="text-dark nav-link me-2 fw-bold">Login</a>
        <a href="{{route('register')}}" class="text-dark nav-link me-2 fw-bold">Register</a>
      @endguest
    </div>
  </div>
</nav>
