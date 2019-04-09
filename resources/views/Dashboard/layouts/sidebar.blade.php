<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    
    <!--<div class="pull-left info">
      <p>Alexander Pierce</p>
      <!-- Status -->
    <!--  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>-->
  </div>

  
  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
  <li class="header">{{Auth::user()->name}}</li>
    <li class="header">MENU</li>
    <!-- Optionally, you can add icons to the links -->
    
    <li class="treeview">
    <a href="#">
      <i class="fa fa-gears"></i> <span>Administrator</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/student"><i class="fa fa-child"></i> Register Student</a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-gear"></i> Setup
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/session"><i class="fa fa-book"></i> Sessions</a></li>
          <li>
            <a href="/class"><i class="fa fa-bank"></i> Classes</a></li>
            <li>
            <a href="/subject"><i class="fa-files-o"></i> Subjects</a></li>
        </ul>
      </li>
      <li><a href="/student/changeClass"><i class="fa fa-group"></i> Change Student Class</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
        <i class="fa fa-gears"></i>
        <span>Teacher</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="/score">
                <i class="fa fa-files-o"></i>Enter Scores</a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-group"></i>Take Attendance</a>
        </li>
    </ul>
</li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>