<x-admin-layout>
  <x-admin-nav></x-admin-nav>
  <x-admin-sidebar></x-admin-sidebar>
    <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Fake Transactions</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">dummy</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
         <!-- Default box -->
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">Transactions</h3>
    
              <div class="card-tools">               
                <a href="{{route('admin.faketransaction.create')}}" class="btn btn-sm btn-primary">
                  <i class="fas fa-plus"></i> create
                </a>
              </div>
            </div>
            <div class="mx-3">@include('inc.messages')</div>
            <div class="card-body p-0">
              <table class="table table-striped projects">
                  <thead>
                      <tr>
                          <th style="width: 20%">
                           Image
                          </th>
                          <th style="width: 12%">
                              Investor
                          </th>
                          <th style="width: 10%">
                            Amount
                        </th>
                          <th style="width: 10cm">
                              Asset 
                          </th>
                          <th style="width: 10%">
                            Transaction
                        </th>
                          <th style="width: 12%">
                            Created 
                        </th>                                                     
                          <th style="width: 25%">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                     @if ($faketrans && count($faketrans)>0)
                         @foreach($faketrans as $dummytran)
                            <tr>
                                <td>
                                  <img src="{{url('storage/'.$dummytran->photo_path)}}" width="100px" height="100px" class="img-circle" alt="">
                                </td>
                                <td>
                                 {{$dummytran->name}}
                                </td>
                                <td>                                    
                                    ${{$dummytran->amount}}                                   
                                </td>
                                <td>                                    
                                    {{$dummytran->currency}}                                   
                                </td>
                                <td>                                    
                                    {{$dummytran->transaction}}                                   
                                </td>
                                <td>
                                {{$dummytran->created_at->diffForHumans()}}
                                </td>
    
                                <td class="project-actions text-right d-flex">                                   
                                    <a class="btn btn-info btn-sm mr-1" href="{{route('admin.faketransaction.edit',[$dummytran->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{route('admin.faketransaction.destroy',[$dummytran->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        {{ __('DELETE') }}
                                    </button>                                  
                                </form>
                                </td>
                            </tr> 
                         @endforeach                     
                     @endif                                                              
                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    
        </section>
        <!-- /.content -->
</div>
<x-admin-footer></x-admin-footer>
</x-admin-layout>