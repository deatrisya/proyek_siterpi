  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('home')}}" id="menu-dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed " href="{{route('employee.index')}}" id="menu-employee">
            <i class="bi bi-person-square"></i>
          <span>Pegawai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed " href="{{route('farm.index')}}" id="menu-farm">
            <i class="bi bi-house"></i>
          <span>Sapi</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" id="feed-nav">
          <i class="bi bi-menu-button-wide"></i><span>Master Pakan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse sidebar-feed" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('feed.index')}}" id="menu-feed">
              <i class="bi bi-circle"></i><span>Pakan</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html" id="menu-detail-feed">
              <i class="bi bi-circle"></i><span>Stok Pakan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Master Obat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html" id="menu-drug">
              <i class="bi bi-circle"></i><span>Obat</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html" id="menu-detail-drug">
              <i class="bi bi-circle"></i><span>Stok Obat</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed " href="{{route('user.index')}}" id="menu-user">
            <i class="bi bi-person"></i>
            <span>User</span>
        </a>
      </li>
      <!-- End Forms Nav -->
    </ul>

  </aside><!-- End Sidebar-->
