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
              <h1 class="m-0">Category Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                
                <li class="breadcrumb-item active">categories</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
         <!-- Default box -->
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">Categories</h3>
    
              <div class="card-tools">               
                <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-primary">
                  <i class="fas fa-plus"></i> create
                </a>
              </div>
            </div>
            <div class="mx-3">@include('inc.messages')</div>
            <div class="card-body p-0">
              <table class="table table-striped projects">
                  <thead>
                      <tr>                         
                          <th>
                              Name
                          </th>                                                 
                          <th>
                              Created 
                          </th>                                                     
                          <th style="width: 25%">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                     @if ($categories && count($categories)>0)
                         @foreach($categories as $category)
                            <tr>                               
                                <td>
                                 {{$category->name}}
                                </td>                                                                
                                <td>
                                {{date('M d, Y',strtotime($category->created_at))}}
                                </td>
    
                                <td class="project-actions text-right d-flex">                                   
                                    <a class="btn btn-info btn-sm mr-1" href="{{route('admin.categories.edit',[$category->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{route('admin.categories.destroy',[$category->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash">
                                        </i> {{ __('DELETE') }}
                                    </button>                                  
                                </form>
                                </td>
                            </tr> 
                         @endforeach
                     @else
                        <tr>
                            <td>
                               
                            </td>
                            <td>
                                <a>
                                    No records
                                </a>
                                <br/>
                                <small>
                                    
                                </small>
                            </td>
                            <td>No records</td>
                            <td>
                                No records
                            </td>

                            <td class="project-actions text-right d-flex">
                               no records
                            </td>
                        </tr> 
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