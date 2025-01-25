<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.users')}}" class="nav-link">Users</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
            {{-- NOTIFICATION DROP DOWN MENU --}}
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-bell"></i>
                @if (count(auth()->user()->unreadNotifications)>0)
                  <span class="badge badge-warning navbar-badge">{{count(auth()->user()->unreadNotifications)}}</span>         
                @endif
                
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  @if (count(auth()->user()->unreadNotifications)>0)
                      <span class="dropdown-item dropdown-header">{{count(auth()->user()->unreadNotifications)}} New Notifications</span>
                      <div class="dropdown-divider"></div>
                      @foreach (auth()->user()->unreadNotifications as $notification)
                          <a href="{{route('admin.notification',[$notification->id])}}" class="dropdown-item">
                              {{$notification->data['action']}}
                              <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span><br><span class="text-primary">mark as read</span>
                          </a>
                          <div class="dropdown-divider"></div> 
                      @endforeach
                      <a href="{{route('admin.notification',['all'])}}" class="dropdown-item dropdown-footer">Mark all As Read</a>
                    @else
                    <a href="#" class="dropdown-item dropdown-footer">No New Notifications</a>                     
                  @endif                    
              </div>
            </li>
       <!-- Logout Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="text-decoration: underline">          
          ADMIN
          <i class="right fas fa-angle-dowwn"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">                    
          <a href="javascript:void(0)"
              onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"  class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
              {{ __('Logout') }}
          </a>
          
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>          
        </div>
      </li>   
    </ul>
  </nav>
  <!-- /.navbar -->
