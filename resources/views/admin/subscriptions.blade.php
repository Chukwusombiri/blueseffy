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
            <h1 class="m-0">Bot Subscription</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">dashboard</a></li>
              
              <li class="breadcrumb-item active">subscriptions</li>
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
                @livewire('admin.manage-subs')
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
    Livewire.on('deletedSubscription', (e) => {
     toastr.success('Subscription deleted successful')
   })
 
   Livewire.on('approvedSubscription', (e) => {
     toastr.success('Subscription approval successful')
   })
 
   Livewire.on('editedSubscription',(e)=>{
     toastr.success('Subscription edited.')   
   })
 </script>