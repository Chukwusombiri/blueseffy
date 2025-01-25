<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">      
      <span class="brand-text font-weight-bold">{{$store ?? 'BluesTech Ltd'}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard               
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="/admin/users" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                User Management
                @if (count($latestusers)>0)
                    <span class="right badge badge-danger">New</span>                    
                @endif
              </p>             
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Transactions
                <i class="right fas fa-angle-left"></i>               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.investments')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Investments                
                  </p>
                </a>                
              </li>
              <li class="nav-item">
                <a href="{{route('admin.deposits')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deposits                   
                  </p>
                </a>                
              </li>
              <li class="nav-item">
                <a href="{{route('admin.withdrawals')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crypto Withdrawals                   
                  </p>
                </a>                
              </li>
              <li class="nav-item">
                <a href="{{route('admin.fiatwithdrawals')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fiat Withdrawals                   
                  </p>
                </a>                
              </li>
              <li class="nav-item">
                <a href="{{route('admin.promos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Promos               
                  </p>
                </a>           
              </li>
              <li class="nav-item">
                <a href="/admin/subscriptions" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Bot subscriptions               
                  </p>
                </a>           
              </li>
              <li class="nav-item">
                <a href="{{route('admin.referralIncome')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Affiliate Program               
                  </p>
                </a>           
              </li>                                                                  
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Activity
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">  
              <li class="nav-item">
                <a href="{{route('admin.faketransaction.index')}}" class="nav-link flex">
                  <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                  </svg>                  
                  </span>
                  <p>Fake Transactions</p>
                </a>
              </li>                                         
              <li class="nav-item">
                <a href="{{route('admin.categories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Article Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.articles')}}" class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Articles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.comments')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comments</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="{{route('admin.faqs')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.testimonials')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonials</p>
                </a>
              </li>                            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Company Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="{{route('admin.company_details')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.company_wallets')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Wallets                   
                  </p>
                </a>                
              </li>
              <li class="nav-item">
                <a href="{{route('admin.plans')}}" class="nav-link">
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>
                    Investment Plans                
                  </p>
                </a>           
              </li>
              <li class="nav-item">
                <a href="{{route('admin.bots')}}" class="nav-link">
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>
                    Trading bots                
                  </p>
                </a>           
              </li>               
              <li class="nav-item">
                <a href="{{route('admin.teamMembers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.getmail')}}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                MailBox               
              </p>
            </a>           
          </li>
          <li class="nav-item">
            <a href="{{route('admin.resetpwd')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Change Password                
              </p>
            </a>           
          </li>                   
          <li class="nav-item">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"  class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                {{ __('Logout') }}
            </a>
            
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