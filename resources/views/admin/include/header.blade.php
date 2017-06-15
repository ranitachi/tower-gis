<div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
          <a href="{{URL::to('admin')}}" class="navbar-brand">
            <small>
              <i class="fa fa-cogs"></i>&nbsp;
              <span style="font-size:18px;">SIM Menara</span>
            </small>
          </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          <ul class="nav ace-nav" style="height:45px !important">
            <li class="light-blue">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="{{asset('avatars/user.jpg')}}" alt="Jason's Photo" />
                <span class="user-info">
                  <small>Welcome,</small>
                  Administrator
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                  <a href="#">
                    <i class="ace-icon fa fa-cog"></i>
                    Change Password
                  </a>
                </li>

                <li class="divider"></li>

                <li>
                  <a href="{{route('logout')}}">
                    <i class="ace-icon fa fa-power-off"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /.navbar-container -->
