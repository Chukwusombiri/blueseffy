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
              <h1 class="m-0">Articles Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                
                <li class="breadcrumb-item active">articles</li>
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
              <h3 class="card-title">Articles</h3>
    
              <div class="card-tools">               
                <a href="{{route('admin.articles.create')}}" class="btn btn-sm btn-primary">
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
                              Title
                          </th>
                          <th style="width: 15%">
                            Category
                        </th>
                        <th style="width: 15%">
                            Author
                        </th>
                          <th style="width: 15%">
                              Created 
                          </th>                                                     
                          <th style="width: 25%">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                     @if ($articles && count($articles)>0)
                         @foreach($articles as $article)
                            <tr>                              
                                <td>
                                 {{$article->title}}
                                </td>
                                <td>       
                                  @if ($article->category->name)
                                      {{$article->category->name}}
                                  @else
                                      {{ __('General') }}
                                  @endif                                                                                                                                       
                                </td>
                                <td>
                                    {{$article->author}}
                                </td>
                                <td>
                                {{$article->created_at->diffForHumans()}}
                                </td>
    
                                <td class="project-actions text-right d-flex">
                                    <a class="btn btn-primary btn-sm mr-1" href="{{route('admin.articles.show',[$article->id])}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm mr-1" href="{{route('admin.articles.edit',[$article->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{route('admin.articles.destroy',[$article->id])}}">
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
