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
            <h1 class="m-0">Testimonials Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              
              <li class="breadcrumb-item active">testimonial</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <!-- Main content -->
      <section class="content">
         <!-- Default box -->
         <div class="card card-solid">
            <div class="card-header">
                <h3 class="card-title">Testimonials</h3>
      
                <div class="card-tools">               
                  <a href="{{route('admin.testimonials.create')}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> add Testimonials
                  </a>
                </div>
              </div>
              <div class="mx-3">@include('inc.messages')</div>


            <div class="card-body pb-0">
              <div class="row">
                @if (count($testimonials)>0)
                    @foreach ($testimonials as $testimonial)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                          <div class="card-header text-muted border-bottom-0">
                            Testifier: {{$testimonial->testifier}}
                          </div>
                          <div class="card-body pt-0">
                            <div class="row">
                              <div class="col-7">
                                <h2 class="lead"><b>{{$testimonial->testifier_job}}</b></h2>
                                <p class="text-muted text-sm">{{$testimonial->testimony}}</p>
                                <p class="text-muted text-sm"><b>Created: </b> {{date('M d, Y',strtotime($testimonial->created_at))}} </p>                            
                              </div>
                              <div class="col-5 text-center">
                                <img src="{{url('storage/'.$testimonial->testifier_img)}}" alt="user-avatar" class="img-circle img-fluid">
                              </div>
                            </div>
                          </div>
                          <div class="card-footer">
                            <div class="text-right d-flex">
                              <a href="{{route('admin.testimonials.edit',[$testimonial->id])}}" class="btn btn-sm bg-teal mr-2">
                                <i class="fas fa-user"></i>Edit
                              </a>
                              <form method="POST" action="{{route('admin.testimonials.destroy',[$testimonial->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> {{ __('DELETE') }}
                                    </button>                                  
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach                    
                @else
                    
                @endif
              </div>
            </div>
            <!-- /.card-body -->           
          </div>
          <!-- /.card -->
    
        </section>
        <!-- /.content -->
</div>
<x-admin-footer></x-admin-footer>
</x-admin-layout>