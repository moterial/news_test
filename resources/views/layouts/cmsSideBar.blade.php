



  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('news.create')}}" >
          <i class="bi bi-file-plus-fill"></i><span>Add News</span>
        </a>
        
      </li>




      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->




      <li class="nav-item">
        @if (Route::has('login'))
        @auth
        <a class="nav-link collapsed" href="{{ route('logout.perform') }}">
          <i class="bi bi-door-open"></i>
          <span>LogOut</span>
        </a>
        @else
        <a class="nav-link collapsed" href="{{ route('login') }}">
          <i class="bi bi-door-open"></i>
          <span>Login</span>
        </a>
        @endauth
        @endif
      </li><!-- End Login Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->


