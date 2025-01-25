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
            <h1 class="m-0">FAQs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.faqs')}}">Back</a></li>
              
              <li class="breadcrumb-item active">FAQs</li>
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
              <h3 class="card-title">Modify FAQ</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
            <!-- form start -->
            <form method="POST" action="{{route('admin.faqs.update',[$faq->id])}}">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="question">question</label>
                        <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{old('question') ?? $faq->question}}" required>
    
                            @error('question')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      </div>                 
                 
                  <div class="form-group col-12">
                    <label for="answer">answer</label>
                    <textarea type="text" class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer"  rows="4" required>{{old('answer') ?? $faq->answer}}</textarea>

                        @error('answer')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>                        
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
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
