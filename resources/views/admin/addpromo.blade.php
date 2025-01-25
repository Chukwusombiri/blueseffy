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
            <h1 class="m-0">Promo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.promos')}}">Back</a></li>
              
              <li class="breadcrumb-item active">promo</li>
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
              <h3 class="card-title">Add Funds</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            <form method="POST" action="{{route('admin.promo.store')}}">
                @csrf
                <div class="form-row">                  
                  @if (isset($user))
                      <input type="hidden" name="user_id"  value="{{$user->id}}">                      
                  @else
                  <div class="form-group col-md-6">
                    <label for="user_id">Investor</label>
                    <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                      <option @if (old('user_id')=='')
                         {{__('selected')}} 
                      @endif>Choose Investor</option>
                      @forelse ($users as $usr)
                      <option value="{{$usr->id}}" @if (old('user_id')==$usr->id)
                        {{__('selected')}} 
                     @endif>{{$usr->name}}</option>
                      @empty
                      <option value=""><a href="{{route('admin.user.create')}}">Create an Investor</a></option>   
                      @endforelse                     
                    </select>
                      @error('user_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div> 
                  @endif
                  <div class="form-group col-md-6">
                    <label for="amount">Amount to Fund($)</label>
                    <input type="number" name="amount" id="amount" class="form-control  @error('amount') is-invalid @enderror" value="{{old('amount')}}"  required>
                    @error('amount')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror  
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="name">Promo Name</label>
                    <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" value="{{old('name')}}"  required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror  
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="promo_message">Promo Message</label>
                    <input type="text" name="promo_message" id="promo_message" class="form-control  @error('promo_message') is-invalid @enderror" value="{{old('promo_message')}}"  required>
                    @error('promo_message')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror  
                  </div>
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Fund Promo</button>
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
