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
            <h1 class="m-0">Company Wallet</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.company_wallets')}}">Back</a></li>
              
              <li class="breadcrumb-item active">wallet</li>
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
              <h3 class="card-title">Edit Wallet</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mx-3">@include('inc.messages')</div>
            <!-- form start -->
            <form method="POST" action="{{route('admin.company_wallet.update',[$wallet->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-row">                                                  
                  <div class="form-group col-md-6">
                    <label for="name">Wallet Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')??$wallet->name}} " required>                    
                        @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>        
                  <div class="form-group col-md-12">
                    <label for="address">Wallet Address</label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address"value="{{old('address')??$wallet->address}}" required>
                        @error('address')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>                 
                  <div class="form-group col-md-12">
                    <label for="address">Wallet Icon (optional)</label>
                    <input type="file" class="@error('icon') is-invalid @enderror" name="icon">
                        @error('icon')
                          <div class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</div>
                        @enderror
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
