<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}"  class="brand-link">
    
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
  
                    @if(isset(Auth::user()->image) )
                        
              <img src="{{ asset('/storage/images/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
                     @else
                         
                       <img class="img-circle img-bordered-sm" src=" {{ asset('/storage/images/default-avatar-profile-image.jpg') }}" alt="image">
                       @endif

        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->username}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('dashboard') }}" class="nav-link {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
        
        
           @if(Auth::user()->is_admin==1)
          <li class="nav-item has-treeview"   >
            <a href="{{ route('users.index') }}" class="nav-link {{ (request()->segment(1) == 'users') ? 'active' : '' }}">
            <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Users
              </p>
            </a>
           
          </li>
          @endif

         @can('department-list')
          <li class="nav-item has-treeview">
            <a href="{{ route('departments.index') }}" class="nav-link {{ (request()->segment(1) == 'departments') ? 'active' : '' }}">
            <i class="far fa-building" aria-hidden="true"></i>
              <p>
                Departments
              </p>
            </a>
           
          </li>
             @endcan

              @if(Auth::user()->is_admin==1)
        
          
           <li class="nav-item has-treeview" >
            <a href="{{ route('roles.index') }}" class="nav-link {{ (request()->segment(1) == 'roles') ? 'active' : '' }} ">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
              <p>
                Roles
              </p>
            </a>
           
          </li>

        
           <li class="nav-item has-treeview">
            <a href="{{ route('permissions.index') }}" class="nav-link  {{ (request()->segment(1) == 'permissions') ? 'active' : '' }}">
            <i class="fa fa-key" aria-hidden="true"></i>
              <p>
                Permissions
              </p>
            </a>
           
          </li>

            <li class="nav-item has-treeview"   >
            <a href="{{ route('log.activity') }}" class="nav-link {{ (request()->segment(1) == 'log_activity') ? 'active' : '' }}">
            <i class="fa fa-history" aria-hidden="true"></i>
              <p>
                Activity Log
              </p>
            </a>
           
          </li>

         @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>