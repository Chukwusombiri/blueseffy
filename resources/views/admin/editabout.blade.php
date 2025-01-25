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
            <h1 class="m-0">About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.about')}}">Back</a></li>
              
              <li class="breadcrumb-item active">about</li>
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
              <h3 class="card-title">Edit About Page</h3>
            </div>
            <!-- /.card-header -->    
            <div class="card-body">
                <div class="mx-2"> @include('inc.messages')</div>
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.about.update',[$about->id])}}">
                @csrf
                @method('PATCH')
                <div class="form-row">                                                 
                  <div class="form-group col-md-6">
                    <label for="about_title">About Title</label>
                    <input type="text" class="form-control @error('about_title') is-invalid @enderror" id="about_title" name="about_title" value="{{old('about_title')??$about->about_title}}" required>                    
                        @error('about_title')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>        
                  <div class="form-group col-md-6">
                    <label for="entry_image">About Main Image</label>
                    <input type="file" id="entry_image" class="form-control  @error('entry_image') is-invalid @enderror" name="entry_image">
                    <p><sub>optional</sub></p>
                        @error('entry_image')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-12">
                    <label for="about_body">About Main Body</label>
                    <textarea id="about_body" rows="5" class="form-control  @error('about_body') is-invalid @enderror" name="about_body" required>{{old('about_body')??$about->about_body}}</textarea>
                        @error('about_body')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-12">
                    <label for="about_list">Main Listed Items</label>
                    <textarea id="about_list" class="form-control  @error('about_list') is-invalid @enderror" name="about_list" required>{{old('about_list')??$about->about_list}}</textarea>
                    <p><sub>Enter a comma separated statements without fullstop.</sub></p>
                        @error('about_list')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-12">
                    <label for="vision_body">Mission Statement</label>
                    <textarea id="vision_body" class="form-control  @error('vision_body') is-invalid @enderror" name="vision_body" required>{{old('vision_body')??$about->vision_body}}</textarea>
                        @error('vision_body')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="vision_img">Mission Image</label>
                    <input type="file" id="vision_img" class="form-control  @error('vision_img') is-invalid @enderror" name="vision_img">
                    <p><sub>optional</sub></p>
                        @error('vision_img')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-6">
                    <label for="closing_title">Vision Title</label>
                    <input type="text" id="closing_title" class="form-control  @error('closing_title') is-invalid @enderror" name="closing_title"value="{{old('closing_title')??$about->closing_title}}" required>
                        @error('closing_title')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>                                                           
                  <div class="form-group col-md-12">
                    <label for="closing_body">Vision body</label>
                    <textarea id="closing_body" class="form-control  @error('closing_body') is-invalid @enderror" name="closing_body" required>{{old('closing_body')??$about->closing_body}}</textarea>
                        @error('closing_body')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="closing_img">Vision Image</label>
                    <input type="file" id="closing_img" class="form-control  @error('closing_img') is-invalid @enderror" name="closing_img">
                    <p><sub>optional</sub></p>
                        @error('closing_img')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>                    
                </div>                          
                <button type="submit" class="btn btn-primary">save</button>
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
