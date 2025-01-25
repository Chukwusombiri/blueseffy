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
              <h1 class="m-0">About Us Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
               
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                
                <li class="breadcrumb-item active">about</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
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
                                        <h4>Title: {{$about->about_title}}</h4><br>
                                        <a href="{{route('admin.about.edit',[$about->id])}}" class="btn btn-primary">Edit About Page</a>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <img class="img-fluid" src="/storage/public/about/{{$about->entry_image}}" alt="">
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <p><b>Main Body: </b>{{$about->about_body}}</p>
                                        <p><b>Listed Items: </b>{{$about->about_list}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>                   
                   
                        <div class="card col-12">
                            <div class="card-body">
                               <div class="row">
                                <div class="col-md-12">
                                    <p>Mission Section</p>
                                </div>
                                    <div class="col-md-5">  
                                        <img class="img-fluid" src="/storage/public/about/{{$about->vision_img}}" alt="">                                                              
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Mission Statement: {{$about->vision_body}}</h4>
                                    </div>                                      
                                </div> 
                            </div>
                        </div>                 
                   
                        <div class="card col-12">
                            <div class="card-body">
                               <div class="row">
                                    <div class="col-12">
                                        <h4>Vision Title: {{$about->closing_title}}</h4>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <img class="img-fluid" src="/storage/public/about/{{$about->closing_img}}" alt="">
                                    </div>
                                    <div class="col-sm-12 col-md-8">                        
                                        <p>Vision body: {{$about->closing_body}}</p>
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