<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    <a href="{{ route("home") }}" class="logo d-flex align-items-center me-auto me-xl-0">
      <h1 class="sitename">SIS</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero">&nbsp;</a></li>
        @auth
      <li><a href="{{ route("students.index") }}">Students</a></li>
      <li><a href="#teachers">Teachers</a></li>
      <li><a href="{{ route("users.index") }}">Users</a></li>
    @endauth
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <div class="auth-buttons d-flex align-items-center">
      @guest
      <div class="btn-group">
      <a class="btn-getstarted me-3" href="{{ route('login') }}">Login</a>
      <a class="btn-getstarted ms-0" href="{{ route('register') }}">Register</a>
      </div>
    @endguest
      @auth
      <form method="POST" action="{{ route("logout") }}">
      @csrf
      <button type="submit" class="btn-getstarted">Logout</button>
      </form>
    @endauth
    </div>
  </div>
</header>