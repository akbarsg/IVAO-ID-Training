<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Trainer Room</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info" style="padding-top: 15px">
                <span>Welcome,</span>
                <h2>{{ $user->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Member List</a></li>
                      <li><a href="index2.html">Request List</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Trainer Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">Assignment</a></li>
                      <li><a href="form_advanced.html">Trainer Report</a></li>
                      <li><a href="form_validation.html">Trainer on Duty</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Member Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">History</a></li>
                      <li><a href="media_gallery.html">Who's Ready?</a></li>
                      <li><a href="typography.html">Who's Passed Exam?</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Schedule <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Training Day</a></li>
                      <li><a href="tables_dynamic.html">Member's Requested</a></li>
            <li><a href="typography.html">Event</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Publication <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">News Management</a></li>
                      <li><a href="chartjs2.html">Released Report</a></li>
                      <li><a href="morisjs.html">Broadcast</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Documentations <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Documentation Management</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <span class="label label-success pull-right">Only Webmaster!</span></a></li><h3>Webmaster</h3>
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
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
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
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>