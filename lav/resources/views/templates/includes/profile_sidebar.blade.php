<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
        @include('templates.includes.user_sidebar')
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">{{ "MAIN NAVIGATION"  }}</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>{{ 'Profile'  }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> {{ "Basic Information"  }}</a></li>
            <!--<li><a href="#"><i class="fa fa-circle-o"></i> {{ "Photos"  }}</a></li>-->
            <li><a href="#"><i class="fa fa-circle-o"></i> {{ "Avatar"  }}</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> {{ "Password"  }}</a></li>

          </ul>
        </li>

        <!--<li><a href="#"><i class="fa fa-dashboard"></i> <span>{{"Activity"  }}</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>