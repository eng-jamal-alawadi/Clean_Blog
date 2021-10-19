<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->


           @if (auth()->user()->user_type == 'admin')
                <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           @endif


      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-address-card"></i>
          <p>
            Posts
            <i class="right fas fa-angle-left"></i>

          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('posts.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All Posts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('posts.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add post</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="far fa-list-alt"></i>
          <p>
            Categories
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All Categories</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Category</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="nav-link">

              <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
      </li>




    </ul>
  </nav>
  <!-- /.sidebar-menu -->
