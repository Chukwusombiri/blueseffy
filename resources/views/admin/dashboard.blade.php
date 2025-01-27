<x-admin-layout>
   <x-admin-nav></x-admin-nav>
   <x-admin-sidebar></x-admin-sidebar>
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              
              <li class="breadcrumb-item active">dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$users}}</h3>

                <p>MEMBERS</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.users')}}" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>${{$totbal}}</h3>

                <p>TOTAL FUNDS</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>  
              <a href="{{route('admin.users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>                          
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>${{$acROI}}</h3>

                <p>RETURN ON INVESTMENT</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div> 
              <a href="{{route('admin.users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>             
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>${{$acbal}}</h3>

                <p>ACTIVE FUNDS</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>   
              <a href="{{route('admin.users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>           
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>${{$dobal}}</h3>

                <p>DORMANT FUNDS</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div> 
              <a href="{{route('admin.users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>                         
            </div>
          </div>
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>${{(!empty($invested_value))?$invested_value:"0.00"}}</h3>

                <p>APPROVED INVESTMENTS: {{(!empty($invested_count))?$invested_count:"0"}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>  
              <a href="{{route('admin.users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>                         
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>${{(!empty($deposited_value))?$deposited_value:"0.00"}}</h3>

                <p>APPROVED DEPOSITS: {{(!empty($deposited_count)) ? $deposited_count:"0"}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>   
              <a href="{{route('admin.users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>                        
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>${{(!empty($withdrawn_value))?$withdrawn_value:"0.00"}}</h3>

                <p>APPROVED WITHDRAWALS: {{(!empty($withdrawn_count))?$withdrawn_count:"0"}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.withdrawals')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>                  
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <div class="row">
              <!-- USERS LIST -->
              @if (count($newusers)>0)
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>
  
                    <div class="card-tools">
                      <span class="badge badge-danger">{{count($newusers)}} New Members</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach ($newusers as $newuser)
                        <li>
                          <img src="{{ asset('storage/'.$newuser->profile_photo_path) }}" alt="User Image">
                          <a class="users-list-name" href="{{route('admin.user.show',[$newuser->id])}}">{{$newuser->name}}</a>
                          <span class="users-list-date">{{$newuser->created_at->diffForHumans()}}</span>
                        </li>   
                      @endforeach                                        
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="/admin/users">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              @endif
              <!-- WITHDRAWAL LIST -->
              @if (count($newwithdrawals)>0)
              <div class="card col-md-6">
                <div class="card-header">
                  <h3 class="card-title">Recently Added Withdrawals</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach ($newwithdrawals as $newwithdrawal)
                    <li class="item">
                      <div class="product-img">
                        <img src="{{url('storage/'.$newwithdrawal->user->profile_photo_path)}}" alt="user Image" class="img-size-50">
                      </div>
                      <div class="product-info">
                        <a href="{{route('admin.user.show',[$newwithdrawal->user_id])}}" class="product-title">{{$newwithdrawal->user->name}}
                          <span class="badge badge-warning float-right">${{$newwithdrawal->amount}}</span></a>
                        <span class="product-description">
                          {{$newwithdrawal->userWallet->name ?? $newwithdrawal->bank_name}}
                        </span>
                      </div>
                    </li>
                    <!-- /.item -->                                                        
                    @endforeach
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="/admin/withdrawals" class="uppercase">View All Withdrawals</a>
                </div>
                <!-- /.card-footer -->
              </div>                  
              @endif
              {{-- col --}}
            </div>
            <!-- /.row -->
          </div>
          <!-- /.col -->

          <div class="col-md-12">
            <!-- TABLE: LATEST ORDERS -->
            <div class="row">
              @if (count($newinvestments)>0)
              <div class="card col-md-8">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest Deposits</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>Member</th>
                        <th>Amount</th>
                        <th>Wallet</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($newinvestments as $newinvestment)
                      <tr>
                        <td><a href="{{route('admin.user.show',[$newinvestment->user->id])}}">{{$newinvestment->user->name}}</a></td>
                        <td>${{$newinvestment->amount}}</td>
                        <td>@if ($newinvestment->is_approved)
                          <span class="badge badge-success">approved</span>                            
                        @else
                        <span class="badge badge-warning">pending</span>  
                        @endif</td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{$newinvestment->wallet->name ?? 'Account Funds'}}</div>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="{{route('admin.investment.create')}}" class="btn btn-sm btn-info float-left">Create New Investment</a>
                  <a href="/admin/investment_deposits" class="btn btn-sm btn-secondary float-right">View All Investments</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->                  
              @endif
              <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="far fa-heart"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Total Investments</span>
                    <span class="info-box-number">{{$totinvestmentcount}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-warning">
                  <span class="info-box-icon"><i class="fas fa-tag"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Total Deposits</span>
                    <span class="info-box-number">{{$totdepcount}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="far fa-heart"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Total Crypto Withdrawals</span>
                    <span class="info-box-number">{{$totwitcount}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="far fa-heart"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Total Fiat Withdrawals</span>
                    <span class="info-box-number">{{$totfiatwitcount}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-danger">
                  <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Total Referrals</span>
                    <span class="info-box-number">{{$totrefcount}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="far fa-comment"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Total Promo</span>
                    <span class="info-box-number">{{$totpromocount}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<x-admin-footer></x-admin-footer>
</x-admin-layout>
