<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HandyMan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="{{ url('admin/broadcast') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                BroadCast
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Jobs
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">5</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/types') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Types</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/job-posts') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Posts</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ url('admin/products') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Posted Profile</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ url('admin/job-contacted') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Contacted</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/job-apc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job A/P/C</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/job-rejected') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jobs Rejected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/ratings') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Ratings</p>
                </a>
              </li>
              
              {{-- <li class="nav-item">
                <a href="{{ url('admin/wishlist') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Likes</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-success right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/currency') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Currency</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/site-settings') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/payment-options') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Option</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/accout-settings') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account Settings</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users Account
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/users-account') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('message.handyman') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Message</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Blog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/blog-category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/posts') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Posts/Articles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                All Messages
                <i class="fas fa-angle-left right"></i>
                
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/handyman-messages') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HandyMan Messages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/contact-messages') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacted Messages</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ url('admin/replied-messages') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Relied Messages/Email</p>
                </a>
              </li> --}}
            </ul>
          </li>

          <li class="nav-header">Web Settings</li>
          <li class="nav-item">
            <a href="{{ url('admin/slider-setting') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Home Slider Settings
                <span class="badge badge-info right">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/logo-favicon') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Logo/Favicon
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
              <p>
                Home Page Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/home-features') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Features section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/home-service') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Services Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/home-banner') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Banner Section</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-warning right">11</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/about-us') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
                <li class="nav-item">
                  <a href="{{ url('admin/portfolio') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Portfolio</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="{{ url('admin/why-us') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Why Choose Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/pricing') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pricing & Plan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/help-faq') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Help & Faq</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/terms_services') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terms & Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/privacy') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Privacy Policy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/refund_policy') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Refund Policy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/license') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>License</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/social-media') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/scams') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fraud Section</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Monthly Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/report') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Report</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Authenticate</li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="nav-icon far fa-circle text-danger"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>


          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
