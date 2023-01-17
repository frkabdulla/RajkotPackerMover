  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="dropdown">
        <li class="nav-item dropdown" id="dropdownMenuButton">
          <button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true">
              <i class="fa fa-cog" aria-hidden="true"></i>
            </button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
          </form>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">  
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </li>
      </div>
    </ul>
  </nav>
  <!-- /.navbar -->