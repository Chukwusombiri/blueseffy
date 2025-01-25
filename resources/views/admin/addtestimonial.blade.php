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
            <h1 class="m-0">Testimonial</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.testimonials')}}">Back</a></li>
              
              <li class="breadcrumb-item active">testimonials</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="row">
    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Testimonial</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
            <!-- form start -->
            <form method="POST" action="{{route('admin.testimonials.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="testifier">Testfier Name</label>
                        <input type="text" class="form-control @error('testifier') is-invalid @enderror" id="testifier" name="testifier" value="{{old('testifier')}}" required>
    
                            @error('testifier')
                              <div class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</div>
                            @enderror
                      </div>
                  <div class="form-group col-md-6">
                    <label for="testifier_job">Testifier job</label>
                    <input type="text" class="form-control @error('testifier_job') is-invalid @enderror" id="testifier_job" name="testifier_job" value="{{old('testifier_job')}}" required>

                        @error('testifier_job')
                          <div class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="form-group col-md-6">
                    <label for="testimony">Testimony</label>
                    <textarea rows="4" type="text" class="form-control @error('testimony') is-invalid @enderror" id="testimony" name="testimony" value="{{old('testimony')}}" required ></textarea>

                        @error('testimony')
                          <div class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</div>
                        @enderror
                  </div>
                         
                  <div class="form-group">
                    <label for="testifier_img">Upload Testfier image</label>
                    <input type="file" class="form-control-file @error('testifier_img') is-invalid @enderror" id="testifier_img" name="testifier_img"> 
                    <p class="text-muted text-sm">optionals: you can choose to leave it empty</p>
                    @error('testifier_img')
                          <div class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">create</button>
              </form>
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
