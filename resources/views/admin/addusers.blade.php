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
            <h1 class="m-0">Members</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Back</a></li>
              
              <li class="breadcrumb-item active">user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add New Investor</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="adminCreateUserForm" method="POST" action='{{route('admin.user.store')}}'>
                      @csrf
                    <div class="card-body">                  
                      <div class="row">
                        <div class="adminCreateUserFormResponse col-sm-12"></div>
                        <div class="form-group col-md-6">
                          <label for="name">Full Name</label>
                          <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}" required autofocus />
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Email address</label>
                          <input  id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required />
                        </div>                        
                        <div class="form-group col-md-6">
                          <label for="phone">Referrer (optional field)</label>
                          <select name="upline_id" id="upline_id" class="form-control">
                            <option value=""  @if (old('upline_id')==''){{__('selected')}} @endif>Select Referrer</option>
                            @forelse ($users as $user)
                              <option value="{{$user->id}}" @if (old('upline_id')==$user->id)
                                  {{__('selected')}}                            
                              @endif>{{$user->name}}</option>  
                            @empty
                                <option value="" selected>No registered users</option>
                            @endforelse
                          </select>
                        </div>                        
                        <div class="form-group col-md-6">
                          <label for="password">Password</label>
                          <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                        </div>                
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                        </div>  
                      </div>                
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer col-md-12">
                      <button type="submit" class="btn btn-primary btn-block">Create</button>
                    </div>
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

