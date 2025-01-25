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
              <h1 class="m-0">Security</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">password</li>
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
                      <h3 class="card-title">Change Password</h3>
                    </div>
                    <div class="mx-3">@include('inc.messages')</div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <!-- form start -->
                    <form action="{{route('admin.reset')}}" method="post">
                        @csrf
                        @method('PATCH')                            
                            <div class="form-group">
                                <label for="current_password">{{ __('Current Password') }}</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="new_password">{{ __('New Password') }}</label>    
                                <input id="new_password" type="password" class=" form-control @error('new_password') is-invalid @enderror" name="new_password" required>        
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <label for="new_password-confirm">{{ __('Confirm Password') }}</label>        
                                <input id="new_password-confirm" class="form-control @error('new_password_confirmation') is-invalid @enderror" type="password" name="new_password_confirmation" required>  
                                @error('new_password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                   
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-sm">
                                {{ __('Save') }}
                            </button>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
              </div>
      </section>
        <!-- /.content -->
</div>
<x-admin-footer></x-admin-footer>
</x-admin-layout>
