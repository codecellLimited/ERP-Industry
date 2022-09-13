 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
    <div class="container">

      <a href="javascript::" class="navbar-brand mr-5">
        <img src="{{asset(AppProperties()->app_logo)}}" width="50" class="img-fluid"/> {{ AppProperties()->app_name }}
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
          </li>
         

          {{-- <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Foods</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('admin.category.list', ['food']) }}" class="dropdown-item">Categories</a></li>
              <li><a href="{{ route('admin.product.list', ['food']) }}" class="dropdown-item">Store</a></li>
            </ul>
          </li> --}}


          <li class="nav-item">
            <a href="{{ route('admin.message.list') }}" class="nav-link">
                Messages
                @if($n = \App\Models\CustomerMessage::where('status', true)->count() > 0)
                <span class="badge bg-primary">
                  {{ __($n) }}
                </span>
                @endif
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.blog.list') }}" class="nav-link">
                Blogs
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('admin.service.list') }}" class="nav-link">
                Success Stories
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.content.list') }}" class="nav-link">
                Web Contents
            </a>
          </li>


        </ul>

        <!-- SEARCH FORM -->
        {{-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> --}}
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle p-1" data-toggle="dropdown" href="#">
            <img src="{{ asset(auth()->guard('admin')->user()->image) }}" alt="profile image" class="rounded-circle img-fluid" width="35">
            {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
            
            <div class="dropdown-item text-center">
              <h6 class="m-0">{{ __(auth()->guard('admin')->user()->name) }}</h6>
              <small>{{ __(auth()->guard('admin')->user()->email) }}</small>
            </div>
            
            <div class="dropdown-divider"></div>


            <a href="{{ route('admin.profile') }}" class="dropdown-item">
                <i class="bi bi-person-circle mr-2"></i> {{__("Profile")}}
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.settings') }}" class="dropdown-item">
                <i class="bi bi-gear mr-2"></i> {{__("Settings")}}
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript::" class="dropdown-item" onclick="document.getElementById('logout-form').submit()">
                <i class="bi bi-box-arrow-left mr-2"></i> {{__("Logout")}}
            </a>
          </div>
        </li>



        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> --}}
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->