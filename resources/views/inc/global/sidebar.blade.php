
<aside class="main-sidebar elevation-4 sidebar-light-warning">
    <a href="{{ url('/') }}" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">MT TELEBEST</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link"><p>១. គ្រប់គ្រងខ្សែរកាប<i class="fas fa-angle-left right"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ route('deploy_cable') }}" class="nav-link">១.១ បើកខ្សែរកាប OPN</a></li>
              <li class="nav-item"><a href="{{ route('deploy_cable') }}" class="nav-link">១.២ របាយការណ៍ អូសកាប</a></li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"><p>២. គ្រប់គ្រងបុគ្គលិក<i class="fas fa-angle-left right"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ route('attendance') }}" class="nav-link">២.១ តារាងស្រង់វត្តមាន</a></li>
              <li class="nav-item"><a href="{{ route('employees') }}" class="nav-link">២.២ បញ្ជីរឈ្មោះបុគ្គលិក</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>