<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    {{-- <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div> --}}
    <div class="info">
      <a href="#" class="d-block">Fikril & Diouf</a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('admin.home')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Homepage
            </p>
          </a>
        </li>
        @if (auth()->user()->role==='admin')
          <li class="nav-item">
            <a href="{{route('bundle.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Bundle
              </p>
            </a>
          </li>
        @endif
        @if (auth()->user()->role==='customer')
          <li class="nav-item">
            <a href="{{route('shoe.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Shoes
              </p>
            </a>
          </li>
        @endif
        <li class="nav-item">
          @if (auth()->user()->role==='admin')
            <a href="{{url('/admin/trans')}}" class="nav-link">  
          @else
            <a href="{{url('/trans')}}" class="nav-link">
          @endif
            <i class="nav-icon fas fa-th"></i>
            <p>
              Transaction
            </p>
          </a>
        </li>
      </ul>
    </nav>
  <!-- /.sidebar-menu -->
</div>