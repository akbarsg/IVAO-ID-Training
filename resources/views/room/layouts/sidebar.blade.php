

<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="/room" class="site_title" style="padding-left: 15px"><img src="http://training.ivao.web.id/images/IVAO-ID-50.png" alt="IVAO ID Logo" style="width: 40px;"> <span>Trainer Room</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info" style="padding-top: 20px">
        <span>Welcome,</span>
        <h2>{{ $user->name }}</h2>
      </div>
    </div>
    <!-- <p style="margin-left: 5%; margin-right: 5%">{{ $user->atcrating->name }} / {{ $user->pilotrating->name }}</p> -->
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="/room"><i class="fa fa-home"></i> Home </a>
          </li>
          <li><a><i class="fa fa-edit"></i> Training <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="/room/training/pending">Pending Request</a></li>
              <li><a href="/room/training/all">All Training</a></li>
              <li><a href="/room/training/mine">My Training</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> User <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="/room/users">All User</a></li>
              <li><a href="/room/profile/{{ $user->id }}">My Profile</a></li>
            </ul>
          </li>
          <li><a href="/"><i class="fa fa-arrow-circle-left"></i> Return to Main Page </a>
          </li>
          <!-- <li><a><i class="fa fa-table"></i> Schedule <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Training Day</a></li>
              <li><a href="#">Member's Requested</a></li>
              <li><a href="#">Event</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-bar-chart-o"></i> Publication <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">News Management</a></li>
              <li><a href="#">Released Report</a></li>
              <li><a href="#">Broadcast</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-clone"></i>Documentations <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Documentation Management</a></li>
            </ul>
          </li> -->
        </ul>
      </div>
              <!-- <div class="menu_section">
                <span class="label label-success pull-right">Only Webmaster!</span><h3>Webmaster</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Main Website <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">Content Management</a></li>
                      <li><a href="project_detail.html">Template Editor</a></li>
                      <li><a href="contacts.html">Navigation Editor</a></li>
                      <li><a href="profile.html">Trainer Manager</a></li>
            <li><a href="profile.html">Admin Manager</a></li>
            <li><a href="projects.html">Settings</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Admin Panel <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">Content Management</a></li>
                      <li><a href="project_detail.html">Template Editor</a></li>
                      <li><a href="contacts.html">Navigation Editor</a></li>
                      <li><a href="profile.html">Trainer Manager</a></li>
            <li><a href="profile.html">Admin Manager</a></li>
            <li><a href="projects.html">Settings</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Member Panel <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">Content Management</a></li>
                      <li><a href="project_detail.html">Template Editor</a></li>
                      <li><a href="contacts.html">Navigation Editor</a></li>
                      <li><a href="profile.html">Trainer Manager</a></li>
            <li><a href="profile.html">Admin Manager</a></li>
            <li><a href="projects.html">Settings</a></li>
                    </ul>
                  </li>              
                </ul>
              </div> -->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>