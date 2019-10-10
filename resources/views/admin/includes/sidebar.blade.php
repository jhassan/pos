<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="nav-icon icon-speedometer"></i> Dashboard
          <span class="badge badge-primary">NEW</span>
        </a>
      </li>
      <li class="nav-title">Cappellos</li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-puzzle"></i> Manage Users</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('admin/users/add') }}">
              <i class="nav-icon icon-puzzle"></i>Add Use</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('admin/users') }}">
              <i class="nav-icon icon-puzzle"></i> View Users</a>
          </li>
        </ul>
      </li>
      
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
