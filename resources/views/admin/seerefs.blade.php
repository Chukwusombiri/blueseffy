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
              <h1 class="m-0">Referrals</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">referral</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">{{$user->name}} Referrals</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 500px;">                    
                    <table class="table table-striped table-hover table-head-fixed text-nowrap">
                        <thead>
                        <tr>                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody> 
                            @forelse ($referrals as $referral)
                                <tr>                                   
                                    </td>                        
                                    <td>{{$referral->name}} <br>
                                      <a href="{{route('admin.user.show',[$referral->id])}}">See more</a></td>
                                    <td>{{$referral->email}}</td>
                                    <td>{{$referral->phone}}</td>
                                    <td>{{$referral->created_at->diffForHumans()}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>This User has not refered anyone yet.😦</td>                                    
                                </tr> 
                            @endforelse                                                         
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
      </div>
    </section>
</div>
<x-admin-footer></x-admin-footer>
</x-admin-layout>
