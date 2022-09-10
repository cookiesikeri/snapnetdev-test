<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
      <a href="{{url('/')}}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>

      <a href="{{route('logout')}}">
        <i class="fa fa-power-off"></i> <span> Logout</span>
      </a>
    </li>


  </ul>
