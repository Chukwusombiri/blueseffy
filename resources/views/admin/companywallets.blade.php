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
            <h1 class="m-0">Company Wallets</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              
              <li class="breadcrumb-item active">wallets</li>
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
          <h3 class="card-title">Company Wallets</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">           
                <a href="{{route('admin.company_wallet.create')}}" class="btn btn-block btn-primary btn-sm">create</a>              
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 500px;"> 
            <div class="mx-3">@include('inc.messages')</div>       
          <table class="table table-striped table-hover text-nowrap">
            <thead>
              <tr>                                        
                <th>wallet</th>
                <th>icon</th>
                <th>address</th>
                <td>no: of transaction</td>
                <th>added</th>    
                <th>action</th>           
              </tr>
            </thead>
            <tbody>
                @if (count($wallets)>0)
                   @foreach ($wallets as $wallet)
                    <tr>                        
                        <td>{{$wallet->name}}</td>
                        <td>
                          <div class="w-50 rounded-full">
                            <img src="{{url('storage/'.$wallet->icon_path)}}" alt="" width="50" height="50">
                          </div>
                        </td>                       
                        <td>{{$wallet->address}}</td>
                        <td>{{$wallet->deposits->count()}}</td>
                        <td>{{$wallet->created_at->diffForHumans()}}</td>  
                        <td class="d-flex"><a href="{{route('admin.company_wallet.edit',[$wallet->id])}}" class="btn  btn-sm btn-primary mr-3">EDIT</a>                            
                            <form method="POST" action="{{route('admin.company_wallet.destroy',[$wallet->id])}}">
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
