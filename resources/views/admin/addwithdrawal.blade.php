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
            <h1 class="m-0">Withdrawals</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.withdrawals')}}">Back</a></li>
              
              <li class="breadcrumb-item active">withdrawal</li>
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
              <h3 class="card-title">Add Withdrawal</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="mx-2"> @include('inc.messages')</div>
            <!-- form start -->
            <form method="POST" action="{{route('admin.withdrawal.store')}}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{old('amount')}}" required>

                        @error('amount')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="user_id">Investor</label>
                    <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                      <option  @if(old('user_id') === '') {{'selected'}} @endif>Choose...</option>
                      @if (count($users)>0)
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" @if(old('user_id') === $user->id){{'selected'}} @endif>{{$user->name}}</option>    
                        @endforeach                                             
                      @else
                        <option value=""><a href="{{route('admin.user.create')}}">No investor. Click to add new investor</a></option>
                      @endif                                                           
                    </select>
                        @error('user_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="wallet_id">Investor Wallet</label>
                    <select id="wallet_id" name="wallet_id" class="form-control @error('wallet_id') is-invalid @enderror" required>
                      <option  @if(old('wallet_id') === '') {{'selected'}} @endif>Choose...</option>
                    </select>
                        @error('wallet_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                  <button type="submit" class="btn btn-primary">Create Withdrawal</button>
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
