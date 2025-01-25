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
              <h1 class="m-0">Trading bots</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">Bots</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
  <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Manage bots</h3>
  
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">           
                  <button onclick='Livewire.emit("openModal","admin.add-bot")' class="btn btn-block btn-primary btn-sm">create</button>              
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 500px;"> 
              @include('inc.messages')                
                @livewire('admin.manage-bots')            
          </div>
          <!-- /.card-body -->
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
  <script>
    Livewire.on('botDeleted',(e)=>{
        toastr.success('Bot was deleted successfully')
    });
    Livewire.on('botEdited',(e)=>{
        toastr.success('Bot was updated successfully')
    });
    Livewire.on('botCreated',(e)=>{
        toastr.success('New Bot was created successfully')
    });
  </script>