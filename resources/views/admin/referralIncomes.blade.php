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
              <h1 class="m-0">Referral Incomes</h1>
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
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Affiliate Earnings</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 500px;">
                    <div class="mx-2"> @include('inc.messages')</div>
                    <table class="table table-striped table-hover table-head-fixed text-nowrap">
                        <thead>
                        <tr>                           
                            <th>Amount</th>
                            <th>Upline</th>
                            <th>Downline</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody> 
                            @foreach ($referralIncomes as $referralIncome)
                                <tr>                                                          
                                    <td>${{$referralIncome->amount}}</td>
                                    <td>{{$referralIncome->user->name}}<br>
                                        <a class="underline" href="{{route('admin.seereferrals',[$referralIncome->user->id])}}">see referrals</a>
                                    </td>
                                    <td>{{$referralIncome->downline->name}}<br>
                                        <a class="underline" href="{{route('admin.seereferrals',[$referralIncome->downline->id])}}">see referrals</a>
                                    </td>
                                    <td>{{$referralIncome->created_at->diffForHumans()}}</td>
                                </tr>                            
                            @endforeach                                                                            
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
