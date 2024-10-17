<header class="header_section">
  <nav class="navbar navbar-expand-lg navbar-light bg-light custom_nav-container">
    <a class="navbar-brand" href="index.html">
      <span>MyShop</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li>
          <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <div class="user_option">
          @if (Route::has('login'))
            @auth
              <li class="nav-item">
                <a class="nav-link" href="{{ url('mycart') }}">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                  [{{ $count }}]
                </a>
              </li>
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <input class="btn btn-success" type="submit" value="Logout" />
                </form>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">
                  <i class="fa fa-user" aria-hidden="true"></i> Login
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">
                  <i class="fa fa-vcard" aria-hidden="true"></i> Register
                </a>
              </li>
            @endauth
          @endif
        </div>
      </ul>
    </div>
  </nav>
</header>
