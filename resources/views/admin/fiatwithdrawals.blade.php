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
              <h2 class="m-0">Fiat Withdrawals Management</h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">withdrawals</li>
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
                  @livewire('admin.show-fiat-withdrawals')       
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
    Livewire.on('deletedFiatWithdrawal', (e) => {
     toastr.success('Fiat Withdrawal deleted successful')
   })
  
   Livewire.on('approvedFiatWithdrawal', (e) => {
     toastr.success('Fiat Withdrawal approval successful')
   })
  
   Livewire.on('editedFiatWithdrawal',(e)=>{
     toastr.success('FiatWithdrawal edited.')   
   })

   Livewire.on('addedFiatWithdrawal',(e)=>{
     toastr.success('FiatWithdrawal added successfully.')   
   })
  </script>