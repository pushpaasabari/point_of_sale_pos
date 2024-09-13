<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('suadmin/index')}}" class="brand-link">
    <img src="{{asset('assets/img/logo_pos.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">{{Session::get('su_sess_name')}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        {{-- <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Session::get('su_sess_email')}}</a>
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
      <ul class="nav nav-pills nav-sidebar nav-legacy flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{url('suadmin/index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Admin's
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('suadmin/user.registration')}}" class="nav-link">
                <i class="fa fa-user-plus nav-icon"></i>
                <p>User Registration</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/user.admin_list')}}" class="nav-link">
                <i class="far fa-id-card nav-icon"></i>
                <p>Admin list</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/user.user_list')}}" class="nav-link">
                <i class="far fa-id-card nav-icon"></i>
                <p>User list</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Customer
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('suadmin/customer.add')}}" class="nav-link">
                <i class="fa fa-user-plus nav-icon"></i>
                <p>Add Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/customer.list')}}" class="nav-link">
                <i class="far fa-id-card nav-icon"></i>
                <p>Customer list</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Vendor
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('suadmin/vendor.add')}}" class="nav-link">
                <i class="fa fa-user-plus nav-icon"></i>
                <p>Add Vendor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/vendor.list')}}" class="nav-link">
                <i class="far fa-id-card nav-icon"></i>
                <p>Vendor list</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
              Product / Item
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('suadmin/item.add')}}" class="nav-link studentedit">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Item</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/item.list')}}" class="nav-link">
                <i class="fa fa-list nav-icon"></i>
                <p>Item list</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Sale
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('suadmin/sale.add')}}" class="nav-link studentedit">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Sale</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/sale.list')}}" class="nav-link">
                <i class="fa fa-list nav-icon"></i>
                <p>Sale list</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
              Purchase
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('suadmin/purchase.add')}}" class="nav-link studentedit">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Purchase</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/purchase.list')}}" class="nav-link">
                <i class="fa fa-list nav-icon"></i>
                <p>Purchase list</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
              Report
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('suadmin/')}}" class="nav-link studentedit">
                <i class="far fa-circle nav-icon"></i>
                <p>Sale Report</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/')}}" class="nav-link">
                <i class="fa fa-list nav-icon"></i>
                <p>Purchase Report</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
              Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('suadmin/business.basic')}}" class="nav-link studentedit">
                <i class="far fa-circle nav-icon"></i>
                <p>Business Details</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('suadmin/business.defaults')}}" class="nav-link">
                <i class="fa fa-list nav-icon"></i>
                <p>Defaults</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Forms
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/forms/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>General Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/advanced.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Advanced Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/editors.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Editors</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/validation.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Validation</p>
              </a>
            </li>
          </ul>
        </li> --}}
        <li class="nav-item">
          <a href="{{url('suadmin/logout')}}" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
        {{-- <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendar
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li> --}}
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>