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
              <h1 class="m-0">Article</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{route('admin.articles')}}">Back</a></li>
                
                <li class="breadcrumb-item active">article</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
         <!-- Default box -->       
            <div class="card card-solid">
                <div class="card-body pb-0">            
                    <div class="row">
                        <div class="card col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <h4>Title: {{$article->title}}</h4>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <img class="img-fluid" src="/storage/{{$article->cover_img}}" alt="">
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <p><b>Description: </b>{{$article->main_content}}</p>
                                        <p><b>Category: </b>{{$article->category->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>                   
                   
                        <div class="card col-12">
                            <div class="card-body">
                               <div class="row">
                                    <div class="col-12">
                                        <h4><b>Sub-title:</b> {{$article->sub_title}}</h4>
                                    </div>
                                    <div class="col-sm-12 col-md-12">                        
                                        <p><b>Sub Description: </b>{{$article->sub_content}}</p>
                                    </div>   
                                </div> 
                            </div>
                        </div>                 
                   
                        <div class="card col-12">
                            <div class="card-body">
                               <div class="row">
                                    <div class="col-12">
                                        <h4>Author: {{$article->author}}</h4>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <img class="img-fluid" src="/storage/{{$article->author_img}}" alt="">
                                    </div>
                                    <div class="col-sm-12 col-md-8">                        
                                        <p><b>Arthur Comment: </b>{{$article->author_comment}}</p>
                                    </div> 
                               </div>
                            </div>
                        </div>                                 
                    </div>            
                </div>
            </div>        
        </section>
    <!-- /.content -->
</div>
<x-admin-footer></x-admin-footer>
</x-admin-layout>
