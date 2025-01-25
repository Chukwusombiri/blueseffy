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
            <h1 class="m-0">Company Plans</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              
              <li class="breadcrumb-item active">plans</li>
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
          <h3 class="card-title">Investment Plans</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">           
                <a href="{{route('admin.plan.create')}}" class="btn btn-block btn-primary btn-sm">create</a>              
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 500px;"> 
            @include('inc.messages')    
          <table class="table table-striped table-hover text-nowrap">
            <thead>
              <tr>                                             
                <th>Plan Name</th>
                <th>Interest Rate</th>
                <th>Min Amount</th>
                <th>Max Amount</th>
                <th>Duration</th>
                <th>Ref commission</th>
                <td>No: of Transaction</td>
                <th>Added</th>    
                <th>action</th>           
              </tr>
            </thead>
            <tbody>
                @if (count($plans)>0)
                   @foreach ($plans as $plan)
                    <tr>                        
                        <td>{{$plan->name}}</td>
                        <td>{{$plan->interest}}%</td>   
                        <td>${{$plan->min}}</td>   
                        <td>${{$plan->max}}</td>
                        <td>{{$plan->duration}} hrs</td> 
                        <td>{{$plan->ref_commission}}%</td>  
                        <td>{{$plan->deposits->count()}}</td>
                        <td>{{$plan->created_at->diffForHumans()}}</td>  
                        <td class="d-flex"><a href="{{route('admin.plan.edit',[$plan->id])}}" class="btn  btn-sm btn-primary mr-3">EDIT</a>                            
                            <form method="POST" action="{{route('admin.plan.destroy',[$plan->id])}}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                                  {{ __('DELETE') }}
                              </button>                                  
                          </form>
                        </td>
                   @endforeach
                @else
                    <tr>
                        <td>No records</td>
                        <td>No records</td>
                        <td>No records</td>
                        <td>No records</td>
                        <td>No records</td>
                        <td>No records</td>                     
                    </tr>  
                @endif
                                 
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
