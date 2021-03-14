
<aside class="main-sidebar elevation-4 sidebar-light-warning">
    <a href="{{ url('/') }}" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">MT TELEBEST</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy text-sm nav-compact nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('attendance') }}" class="nav-link">
              <p>១. តារាងស្រង់វត្តមាន</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('employees') }}" class="nav-link">
              <p>២. តារាងបុគ្គលិក</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('deploy_cable') }}" class="nav-link">
              <p>៣. របាយការណ៍ខ្សែរកាបទិ៍ OPN</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>