<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar">
      <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script>

      <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
          <a href="index.html" class="navbar-brand">
            <small>
              <i class="fa fa-leaf"></i>
              Ace Admin
            </small>
          </a>

          <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
            <span class="sr-only">Toggle user menu</span>

            <img src="{{asset('avatars/user.jpg')}}" alt="Jason's Photo" />
          </button>

          <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
          </button>
        </div>

       

        <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Manage
        &nbsp;
                <i class="ace-icon fa fa-angle-down bigger-110"></i>
              </a>

              <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                <li>
                  <a href="#">
                    <i class="ace-icon fa fa-eye bigger-110 blue"></i>
                    Monthly Visitors
                  </a>
                </li>

                <li>
                  <a href="#">
                    <i class="ace-icon fa fa-user bigger-110 blue"></i>
                    Active Users
                  </a>
                </li>

                <li>
                  <a href="#">
                    <i class="ace-icon fa fa-cog bigger-110 blue"></i>
                    Settings
                  </a>
                </li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="ace-icon fa fa-envelope"></i>
                Messages
                <span class="badge badge-warning">5</span>
              </a>
            </li>
          </ul>

          <form class="navbar-form navbar-left form-search" role="search">
            <div class="form-group">
              <input type="text" placeholder="search" />
            </div>

            <button type="button" class="btn btn-mini btn-info2">
              <i class="ace-icon fa fa-search icon-only bigger-110"></i>
            </button>
          </form>
        </nav>
      </div><!-- /.navbar-container -->
    </div>