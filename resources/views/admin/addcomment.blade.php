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
            <h1 class="m-0">Comments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.comments')}}">Back</a></li>
              
              <li class="breadcrumb-item active">comment</li>
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
              <h3 class="card-comment">Create Comment</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.comments.store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="commenter">Commenter</label>
                        <input type="text" class="form-control @error('commenter') is-invalid @enderror" id="commenter" name="commenter" value="{{old('commenter')}}" required>
    
                            @error('commenter')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      </div>
                                           
                 
                  <div class="form-group col-12">
                    <label for="comment">Comment</label>
                    <textarea type="text" class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" value="{{old('comment')}}" rows="4" required></textarea>

                        @error('comment')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>                                   
                                                                                
                  <div class="form-group col-md-6">
                    <label for="article_id">Article</label>
                    <select id="article_id" name="article_id" class="form-control @error('article_id') is-invalid @enderror" required>
                      <option @if(old('article_id')==''){{'selected'}}@endif>Choose...</option>
                      @if (count($articles)>0)
                        @foreach ($articles as $article)
                            <option value="{{$article->id}}" @if(old('article_id')==$article->id){{'selected'}}@endif>{{$article->title}}</option>    
                        @endforeach                                             
                      @else
                        <option value="">No articles. Go to Layout -> Article and create a Article.</option>
                      @endif                                                           
                    </select>
                        @error('article_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-12">
                    <label for="commenter_img">Comment Image (optional)</label>
                    <input type="file" class="form-control @error('commenter_img') is-invalid @enderror" id="commenter_img" name="commenter_img">

                        @error('commenter_img')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div> 
                                         
                </div>
                <button type="submit" class="btn btn-primary">Create Comment</button>
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
