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
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              <li class="breadcrumb-item"><a href="{{route('admin.categories')}}">Back</a></li>
              
              <li class="breadcrumb-item active">category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-8 col-lg-6">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Category</h3>
            </div>                      
            <!-- form start -->
            <form method="POST" action='{{route('admin.categories.store')}}'>

                @csrf                  
              <div class="card-body">                  
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input id="name" class="form-control @error('category') is-invalid @enderror" type="text" name="name" value="{{old('name')}}" required autofocus />
                  </div>
               
                  @error('name')
                      <div class="alert alert-danger">{{$message}}</div>
                  @enderror
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-md btn-primary">create</button>
              </div>
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